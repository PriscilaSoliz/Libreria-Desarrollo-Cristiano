<?php

namespace Database\Seeders;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class UsersSeeder extends Seeder
{


    /**
     * Run the database seeds.
     */


        //crear admin
        public function run()
        {
            // Verifica si ya existe un usuario con el correo electrónico
            $existingUser = User::where('email', 'Daniel@gmail.com')->first();

            // Si no existe, crea el usuario
            if (!$existingUser) {
                User::create([
                    'name' => 'Daniel Castedo',
                    'email' => 'daniel@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('Administrador');
            }
                User::create([
                    'name' => 'Priscila',
                    'email' => 'priscila@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('Vendedor');

                User::create([
                    'name' => 'Francisco',
                    'email' => 'francisco@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('Administrador');

                User::create([
                    'name' => 'Jorge Calderon',
                    'email' => 'jorge@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('Almacenero');
        }
}
