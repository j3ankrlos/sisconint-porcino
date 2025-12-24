<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create Permissions
        Permission::firstOrCreate(['name' => 'view_dashboard']);
        Permission::firstOrCreate(['name' => 'manage_users']);
        Permission::firstOrCreate(['name' => 'manage_roles']);

        // Create Roles and Assign Permissions
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $adminRole->givePermissionTo(Permission::all());

        $userRole = Role::firstOrCreate(['name' => 'User']);
        $userRole->givePermissionTo(['view_dashboard']);
        
        $user = \App\Models\User::find(1);
        if ($user) {
            $user->assignRole('Admin');
        }
    }
}
