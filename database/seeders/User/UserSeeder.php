<?php

namespace Database\Seeders\User;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => 'Ezra Lazuardy',
            'email' => 'ezralazuardy@students.undip.ac.id',
        ]);

        User::factory()->create([
            'name' => 'Salahudin Al Ayubi',
            'email' => 'salahudin@students.undip.ac.id',
        ]);

        User::factory()->create([
            'name' => 'Dhea Rahma Putri',
            'email' => 'dhearahmap@students.undip.ac.id',
        ]);

        User::factory(10)->create();
    }
}
