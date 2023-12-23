<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions
        $permissions = [
            'students' => ['index', 'create', 'update'],
            // 'payroll_components' => ['update'],
            // 'users' => ['index', 'create', 'read', 'update'],
            // 'locations' => ['index', 'create', 'read', 'update'],
            // 'positions' => ['index', 'create', 'update'],
            // 'divisions' => ['index', 'create', 'update'],
            // 'employees' => ['index', 'create', 'read', 'update'],
            // 'presences' => ['index'],
            // 'overtimes' => ['index'],
            // 'timeoffs' => ['index'],
            // 'payrolls' => ['index', 'create'],
            // 'queues' => ['index'],
        ];

        foreach ($permissions as $permission => $methods) {
            foreach ($methods as $method) {
                Permission::create(['name' => "$method $permission"]);
            }
        }

        $roles = [
            'Teacher' => [],
            // 'Human Resource Development' => [
            //     'locations' => ['index', 'create', 'read', 'update', 'delete', 'upload'],
            //     'positions' => ['index', 'create', 'read', 'update', 'delete', 'upload'],
            //     'divisions' => ['index', 'create', 'read', 'update', 'delete', 'upload'],
            //     'employees' => ['index', 'create', 'read', 'update', 'delete', 'upload'],
            //     'presences' => ['index'],
            //     'overtimes' => ['index'],
            //     'timeoffs' => ['index'],
            //     'payrolls' => ['index', 'create', 'read', 'update', 'delete', 'upload'],
            // ],
            // 'Supervisor' => [
            //     'presences' => ['index'],
            //     'overtimes' => ['index'],
            //     'timeoffs' => ['index'],
            // ],
            // 'Employee' => [
            //     'presences' => ['index'],
            // ],
            'Super Admin' => [
                'students' => ['index', 'create', 'update'],
                // 'companies' => ['index', 'create', 'read', 'update'],
                // 'payroll_components' => ['update'],
                // 'users' => ['index', 'create', 'read', 'update'],
                // 'locations' => ['index', 'create', 'read', 'update'],
                // 'positions' => ['index', 'create', 'update'],
                // 'divisions' => ['index', 'create', 'update'],
                // 'employees' => ['index', 'create', 'read', 'update'],
                // 'presences' => ['index'],
                // 'overtimes' => ['index'],
                // 'timeoffs' => ['index'],
                // 'payrolls' => ['index', 'create'],
                // 'queues' => ['index'],
            ]
        ];

        foreach ($roles as $role => $permissions) {
            $role = Role::create(['name' => $role]);
            foreach ($permissions as $permission => $methods) {
                foreach ($methods as $method) {
                    $role->givePermissionTo("$method $permission");
                }
            }
        }
    }
}
