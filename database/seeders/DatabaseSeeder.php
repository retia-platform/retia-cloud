<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The database seeders.
     */
    private array $seeders = [
        User\RoleSeeder::class,
        User\UserSeeder::class,
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call($this->seeders);
    }
}
