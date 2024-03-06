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
        $this->superAdministrator = Role::create(['name' => 'Super Administrator']);
        $this->administrator = Role::create(['name' => 'Administrator']);
        $this->technician = Role::create(['name' => 'Technician']);

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
