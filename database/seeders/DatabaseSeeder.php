<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Event;
use App\Models\MType;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(MTypeSeeder::class);
        $this->call(EventSeeder::class);
        $this->call(MsituationSeeder::class);

        //UN FACTORY POR SI ACASO. (AGREGA DATOS DE PRUEBA A LA BASE DE DATOS)
        /*MType::factory(5)->create();*/
    }
}
