<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Crear roles
        $roleAdministrador = Role::firstOrCreate(['name' => 'Administrador']);
        $roleDoctor = Role::firstOrCreate(['name' => 'Doctor']);
        $roleSupervisor = Role::firstOrCreate(['name' => 'Supervisor']);
        $roleParamedico = Role::firstOrCreate(['name' => 'Paramedico']);
        $roleCliente = Role::firstOrCreate(['name' => 'Cliente']);
        $rolePaciente = Role::firstOrCreate(['name' => 'Paciente']);
        $roleRecepcionista = Role::firstOrCreate(['name' => 'Recepcionista']);
        $roleExterno = Role::firstOrCreate(['name' => 'Externo']);

        // Crear usuarios

        $Administrador = User::firstOrCreate(['email' => 'jose-atil@hotmail.com'], [
            'name' => 'Jose Reyna Ortiz',
            'password' => bcrypt('jose'),
        ]);


        // Asignar roles a los usuarios
        $Administrador->assignRole($roleAdministrador);


        // Si tienes permisos definidos, los asignas al super-admin
        $Administrador->givePermissionTo(Permission::all());
    }
}
