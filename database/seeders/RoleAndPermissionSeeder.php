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
            'results' => ['index', 'read'],
            'students' => ['index', 'create', 'update'],
            'classrooms' => ['index', 'create', 'update'],
            'users' => ['index', 'create', 'update'],
        ];

        foreach ($permissions as $permission => $methods) {
            foreach ($methods as $method) {
                Permission::create(['name' => "$method $permission"]);
            }
        }

        $roles = [
            'Teacher' => [
                'results' => ['index', 'read'],
                'students' => ['index', 'create', 'update'],
            ],
            'Super Admin' => [
                'results' => ['index', 'read'],
                'students' => ['index', 'create', 'update'],
                'classrooms' => ['index', 'create', 'update'],
                'users' => ['index', 'create', 'update'],
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
