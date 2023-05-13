<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Create default permissions
        Permission::create(['name' => 'list biens']);
        Permission::create(['name' => 'view biens']);
        Permission::create(['name' => 'create biens']);
        Permission::create(['name' => 'update biens']);
        Permission::create(['name' => 'delete biens']);

        Permission::create(['name' => 'list caracteristiques']);
        Permission::create(['name' => 'view caracteristiques']);
        Permission::create(['name' => 'create caracteristiques']);
        Permission::create(['name' => 'update caracteristiques']);
        Permission::create(['name' => 'delete caracteristiques']);

        Permission::create(['name' => 'list commentaires']);
        Permission::create(['name' => 'view commentaires']);
        Permission::create(['name' => 'create commentaires']);
        Permission::create(['name' => 'update commentaires']);
        Permission::create(['name' => 'delete commentaires']);

        Permission::create(['name' => 'list marques']);
        Permission::create(['name' => 'view marques']);
        Permission::create(['name' => 'create marques']);
        Permission::create(['name' => 'update marques']);
        Permission::create(['name' => 'delete marques']);

        Permission::create(['name' => 'list allmedia']);
        Permission::create(['name' => 'view allmedia']);
        Permission::create(['name' => 'create allmedia']);
        Permission::create(['name' => 'update allmedia']);
        Permission::create(['name' => 'delete allmedia']);

        Permission::create(['name' => 'list modeles']);
        Permission::create(['name' => 'view modeles']);
        Permission::create(['name' => 'create modeles']);
        Permission::create(['name' => 'update modeles']);
        Permission::create(['name' => 'delete modeles']);

        Permission::create(['name' => 'list types']);
        Permission::create(['name' => 'view types']);
        Permission::create(['name' => 'create types']);
        Permission::create(['name' => 'update types']);
        Permission::create(['name' => 'delete types']);

        // Create user role and assign existing permissions
        $currentPermissions = Permission::all();
        $userRole = Role::create(['name' => 'user']);
        $userRole->givePermissionTo($currentPermissions);

        // Create admin exclusive permissions
        Permission::create(['name' => 'list roles']);
        Permission::create(['name' => 'view roles']);
        Permission::create(['name' => 'create roles']);
        Permission::create(['name' => 'update roles']);
        Permission::create(['name' => 'delete roles']);

        Permission::create(['name' => 'list permissions']);
        Permission::create(['name' => 'view permissions']);
        Permission::create(['name' => 'create permissions']);
        Permission::create(['name' => 'update permissions']);
        Permission::create(['name' => 'delete permissions']);

        Permission::create(['name' => 'list users']);
        Permission::create(['name' => 'view users']);
        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'update users']);
        Permission::create(['name' => 'delete users']);

        // Create admin role and assign all permissions
        $allPermissions = Permission::all();
        $adminRole = Role::create(['name' => 'super-admin']);
        $adminRole->givePermissionTo($allPermissions);

        $user = \App\Models\User::whereEmail('admin@admin.com')->first();

        if ($user) {
            $user->assignRole($adminRole);
        }
    }
}
