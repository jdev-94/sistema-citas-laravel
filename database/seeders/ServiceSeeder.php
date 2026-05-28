<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Service::create([
            'name' => 'Corte de Cabello Caballero',
            'description' => 'Incluye lavado, asesoramiento de estilo y peinado con cera.',
            'duration_minutes' => 30,
            'price' => 15.00,
        ]);

        Service::create([
            'name' => 'Arreglo de Barba Premium',
            'description' => 'Perfilado a navaja, hidratación con aceites esenciales y toalla caliente.',
            'duration_minutes' => 20,
            'price' => 10.00,
        ]);

        Service::create([
            'name' => 'Servicio Completo (Corte + Barba)',
            'description' => 'El combo definitivo para lucir impecable.',
            'duration_minutes' => 50,
            'price' => 22.50,
        ]);
    }
}
