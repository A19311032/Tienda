<?php

namespace App\Imports;

use App\Models\Paciente;
use DateTime;
use Exception;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PacientesImport implements ToModel, WithHeadingRow
{
    
    public $duplicatedRfcs = []; // Array para almacenar los rfc duplicados
    public function getDuplicatedRfcs(): array {
        return $this->duplicatedRfcs;
    }
    
    public function model(array $row)
    {
        if (empty($row['name'])) {
            return null;
        }

        // Verificar si la fecha_nacimiento existe y no está vacía
        if (isset($row['fecha_nacimiento']) && !empty($row['fecha_nacimiento'])) {
            $fechaOriginal = $row['fecha_nacimiento'];

            if (is_numeric($fechaOriginal)) {
                // Si es numérico, asumimos que es una fecha en formato Excel y la convertimos
                $dateTime = $this->excelDateToDateTime($fechaOriginal);
                $fechaFormateada = $dateTime->format('Y-m-d');
            } else {
                // Si no es numérico, intentamos convertirlo como una fecha d/m/Y
                $fechaDateTime = DateTime::createFromFormat('d/m/Y', $fechaOriginal);

                if ($fechaDateTime === false) {
                    throw new Exception("Error al procesar la fecha: " . $fechaOriginal);
                }
                $fechaFormateada = $fechaDateTime->format('Y-m-d');
            }
        } else {
            $fechaFormateada = null; // o cualquier otro valor predeterminado que quieras usar
        }

        // Verificar si ya existe un paciente con ese rfc
        $existingPaciente = Paciente::where('rfc', $row['rfc'])->first();
        if ($existingPaciente) {
            $this->duplicatedRfcs[] = $row['rfc']; // Agregamos el rfc duplicado al array
            return null;
        }

        return new Paciente([
            'name' => $row['name'],
            'empresa' => $row['empresa'],
            'rfc' => $row['rfc'],
            'estatus' => $row['estatus'],
            'fecha_nacimiento' => $fechaFormateada,
            'estado' => $row['estado'],
            'cuidad' => $row['cuidad'],
            'codigo_postal' => $row['codigo_postal'],
            'colonia' => $row['colonia'],
            'calle' => $row['calle'],
        ]);
    }

    /**
     * Convert Excel date format (number of days since '1900-01-01') to a DateTime object
     *
     * @param int $excelDate The number of days since '1900-01-01' - Excel's zero date.
     * @return DateTime
     */
    private function excelDateToDateTime(int $excelDate): DateTime {
        if ($excelDate < 60) {
            $excelDate++;
        }
        $unixTimestamp = ($excelDate - 25569) * 86400;
        return (new DateTime())->setTimestamp($unixTimestamp);
    }
}
