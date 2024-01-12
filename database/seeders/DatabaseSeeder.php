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
            RoleSeeder::class, // Llama al seeder de roles
            UsersSeeder::class, // Llama al seeder de usuarios
            SemestreSeeder::class, // Llama al seeder de usuarios
            DocenteSeeder::class,
            MateriaSeeder::class,
            DocenteMateriaSeeder::class,
        ]);
    }
}
