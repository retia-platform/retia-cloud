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
        ])->assignRole('Administrator');

        User::factory()->create([
            'name' => 'Salahudin Al Ayubi',
            'email' => 'salahudin@students.undip.ac.id',
        ])->assignRole('Administrator');

        User::factory()->create([
            'name' => 'Dhea Rahma Putri',
            'email' => 'dhearahmap@students.undip.ac.id',
        ])->assignRole('Administrator');

        User::factory()->create([
            'name' => 'Super Administrator',
            'email' => 'super-administrator@email.com',
        ])->assignRole('Super Administrator');

        User::factory()->create([
            'name' => 'Administrator',
            'email' => 'administrator@email.com',
        ])->assignRole('Administrator');

        User::factory()->create([
            'name' => 'Technician',
            'email' => 'technician@email.com',
        ])->assignRole('Technician');

        User::factory(14)->create()->each(fn ($user) => $user->assignRole('Technician'));
    }
}
