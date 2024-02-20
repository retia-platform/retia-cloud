<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * The database seeders.
     *
     * @var array
     */
    private array $seeders = [
        User\UserSeeder::class,
    ];

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->run($this->seeders);
    }
}
