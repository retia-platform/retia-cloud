<?php

namespace App\Repositories;

use App\Enums\User\Role;
use App\Helpers\Vault;
use App\Models\User;
use Illuminate\Support\Collection;

class UserRepository
{
    public function getAllUsers(bool $fresh = false): Collection
    {
        if (! $fresh && ! empty($cache = Vault::get('getAllUsers'))) {
            return $cache;
        }

        $users = User::all();

        Vault::set('getAllUsers', $users);

        return $users;
    }

    public function getUser(?int $id): User
    {
        return User::findOrFail($id ?? 0);
    }

    public function getSuperAdministratorUsers()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', Role::SUPER_ADMINISTRATOR->label());
        })->get();
    }

    public function getAdministratorUsers()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', Role::ADMINISTRATOR->label());
        })->get();
    }

    public function getTechnicianUsers()
    {
        return User::whereHas('roles', function ($query) {
            $query->orWhere('name', Role::TECHNICIAN->label());
        })->get();
    }

    public function getAdministratorAndTechnicianUsers()
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', Role::ADMINISTRATOR->label());
            $query->orWhere('name', Role::TECHNICIAN->label());
        })->get();
    }

    public function getAllUserCount()
    {
        return $this->getAllUsers()->count();
    }

    public function getSuperAdministratorUserCount()
    {
        return User::where('role', Role::SUPER_ADMINISTRATOR)->count();
    }

    public function getAdministratorUserCount()
    {
        return User::where('role', Role::ADMINISTRATOR)->count();
    }

    public function getTechnicianUserCount()
    {
        return User::where('role', Role::TECHNICIAN)->count();
    }

    public function deleteUser(int $id)
    {
        User::findOrFail($id)->delete();
    }
}
