<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MType>
 */
class MTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     //ESTE METODO SE ENCARGA DE CREAR LOS DATOS DE PRUEBA
    public function definition(): array
    {
        $options = [
            'Tutoria Individual', 
            'Tutoria Grupal',
            'Tutoria de Regularización',
            'Tutoria de Recuperación Académica',
            'Tutoria entre Pares',
        ];

        return [
            //
            'name' => Arr::random($options),
        ]; 
    }
}
