<?php

namespace Database\Seeders;

use App\Models\Msituation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsituationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Msituation::create(['name' => 'Regular']);
        Msituation::create(['name' => 'Irregular']);
        Msituation::create(['name' => 'Dictaminado']);
        Msituation::create(['name' => 'Baja Temporal']);
        Msituation::create(['name' => 'Baja Definitiva']);
        Msituation::create(['name' => 'Egresado']);
    }
}
