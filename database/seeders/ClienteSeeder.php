<?php

namespace Database\Seeders;

use App\Models\cliente;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Insertar datos de prueba en la tabla 'clientes'
        Cliente::create([
            'ci' => 123456789, // Puedes cambiar estos valores según tus necesidades
            'nombre' => 'Nombre Cliente',
            'celular' => '1234567890',
            'direccion' => 'Dirección Cliente',
            'correo' => 'cliente@example.com',
        ]);
        // Insertar datos de prueba en la tabla 'clientes'
        Cliente::create([
            'ci' => 11380657, // Puedes cambiar estos valores según tus necesidades
            'nombre' => 'Nombre Cliente',
            'celular' => '1234567890',
            'direccion' => 'Dirección Cliente',
            'correo' => 'cliente@example.com',
        ]);
    }
}
