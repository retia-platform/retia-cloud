<?php

namespace Database\Seeders\User;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    private Role $superAdministrator;

    private Role $administrator;

    private Role $technician;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // create roles for web guard
        $this->superAdministrator = Role::create([
            'name' => \App\Enums\User\Role::SUPER_ADMINISTRATOR->label(),
            'guard_name' => 'web',
        ]);
        $this->administrator = Role::create([
            'name' => \App\Enums\User\Role::ADMINISTRATOR->label(),
            'guard_name' => 'web',
        ]);
        $this->technician = Role::create([
            'name' => \App\Enums\User\Role::TECHNICIAN->label(),
            'guard_name' => 'web',
        ]);

        // create roles for sanctum guard
        Role::create([
            'name' => \App\Enums\User\Role::SUPER_ADMINISTRATOR->label(),
            'guard_name' => 'sanctum',
        ]);
        Role::create([
            'name' => \App\Enums\User\Role::ADMINISTRATOR->label(),
            'guard_name' => 'sanctum',
        ]);
        Role::create([
            'name' => \App\Enums\User\Role::TECHNICIAN->label(),
            'guard_name' => 'sanctum',
        ]);

        // setting permissions
        $this->applyPermissionsToAllRole([
            'update theme',
            'update profile information',
            'update password',
            'manage two factor authentication',
            'manage session',
            'delete account',
        ]);

        // notification permissions
        $this->applyPermissionsToAllRole([
            'read notification',
            'update notification',
        ]);

        // analytic permissions
        $this->applyPermissionsToAllRole([
            'read general analytic',
            'read build information',
        ]);
        $this->applyPermissionsToSuperAdministratorAndAdministrator([
            'read user analytic',
            'access pulse',
            'access telescope',
            'access horizon',
            'access health check',
        ]);

        // device permissions
        $this->applyPermissionsToAllRole([
            'create device',
            'read device',
            'update device',
            'delete device',
        ]);

        // detector permissions
        $this->applyPermissionsToAllRole([
            'create detector',
            'read detector',
            'update detector',
            'delete detector',
        ]);

        // activity log
        $this->applyPermissionsToSuperAdministratorAndAdministrator([
            'read activity log',
        ]);

        // user permissions
        $this->applyPermissionsToSuperAdministratorAndAdministrator([
            'create user',
            'read user',
            'update user',
            'delete user',
        ]);
    }

    private function applyPermissionsToAllRole(array $permissions): void
    {
        $this->applyPermissionsToSuperAdministrator($permissions);
        $this->applyPermissionsToAdministrator($permissions);
        $this->applyPermissionsToTechnician($permissions);
    }

    private function applyPermissionsToSuperAdministratorAndAdministrator(array $permissions): void
    {
        $this->applyPermissionsToSuperAdministrator($permissions);
        $this->applyPermissionsToAdministrator($permissions);
    }

    private function applyPermissionsToSuperAdministrator(array $permissions): void
    {
        $this->superAdministrator->givePermissionTo($this->formatPermissions($permissions));
    }

    private function applyPermissionsToAdministrator(array $permissions): void
    {
        $this->administrator->givePermissionTo($this->formatPermissions($permissions));
    }

    private function applyPermissionsToTechnician(array $permissions): void
    {
        $this->technician->givePermissionTo($this->formatPermissions($permissions));
    }

    private function formatPermissions(array $permissions): array
    {
        return array_map(function ($permission) {
            if ($permission instanceof Permission) {
                return $permission;
            }

            return Permission::updateOrCreate(['name' => $permission]);
        }, $permissions);
    }
}
