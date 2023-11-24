<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Detallecategoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        //  \App\Models\User::factory(1)->create();

        //  \App\Models\User::factory()->create([
        //      'name' => 'Test User',
        //      'email' => 'test@example.com',
        //  ]);
        
        $this->call([
            Proveedor::class,
            CategoriaSeeder::class,
            RoleSeeder::class, // Llama al seeder de roles
            UsersSeeder::class, // Llama al seeder de usuarios
            ProductoSeeder::class, // Llama al seeder de productos
            EmpleadoSeeder::class, // Llama al seeder de empleados
            DetalleSeeder::class,
            DetalleSeeder::class,
            // ClienteSeeder::class,
            CompraSeeder::class,
            VentaSeeder::class,
        ]);
    }
}
