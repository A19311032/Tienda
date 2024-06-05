<?php

namespace Database\Seeders; 


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    public function run()
    {
        // Crear permisos
        $editArticles = Permission::create(['name' => 'edit articles']);
        $deleteArticles = Permission::create(['name' => 'delete articles']);
        // ... añade más permisos según lo necesites

        // Crear roles y asignar permisos existentes
        $admin = Role::create(['name' => 'admin']);
        $admin->givePermissionTo($editArticles);
        $admin->givePermissionTo($deleteArticles);

        $editor = Role::create(['name' => 'editor']);
        $editor->givePermissionTo($editArticles);

        // Super-admin que tiene todos los permisos
        $superAdmin = Role::create(['name' => 'super-admin']);
        $superAdmin->givePermissionTo(Permission::all());
    }
}
