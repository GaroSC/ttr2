<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            'name' => 'Admin',
            'id_ipn' => '0123456789',
            'phone' => '1234567890',
            'email' => 'admin@test.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Admin');

        User::create([
            'name' => 'Mentor',
            'id_ipn' => '0123456789',
            'phone' => '1234567890',
            'email' => 'mentor@test.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Mentor');

        User::create([
            'name' => 'Mentee',
            'id_ipn' => '0123456789',
            'phone' => '1234567890',
            'email' => 'mentee@test.com',
            'password' => bcrypt('123456789'),
        ])->assignRole('Mentee');

        User::factory(20)->create()->each(function ($user) {
            $user->assignRole('Mentee');
        });
    }
}
