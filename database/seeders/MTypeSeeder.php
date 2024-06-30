<?php

namespace Database\Seeders;

use App\Models\MType;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MType::create(['name' => 'Tutoria Individual']);
        MType::create(['name' => 'Tutoria Grupal']);
        MType::create(['name' => 'Tutoria de Regularización']);
        MType::create(['name' => 'Tutoria de Recuperación Académica']);
        MType::create(['name' => 'Tutoria entre Pares']);
    }
}
