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
