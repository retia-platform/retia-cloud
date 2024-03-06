<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The database seeders.
     */
    private array $seeders = [
        User\UserSeeder::class,
        User\RoleSeeder::class,
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call($this->seeders);
    }
}
