<?php

namespace Database\Seeders;

use App\Models\Mtype;
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
        Mtype::create(['name' => 'Tutoria Individual']);
        Mtype::create(['name' => 'Tutoria Grupal']);
        Mtype::create(['name' => 'Tutoria de Regularización']);
        Mtype::create(['name' => 'Tutoria de Recuperación Académica']);
        Mtype::create(['name' => 'Tutoria entre Pares']);
    }
}
