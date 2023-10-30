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
                    'email' => 'Daniel@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('admin');
            }
                User::create([
                    'name' => 'Priscila',
                    'email' => 'Priscila@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('empleado');

                User::create([
                    'name' => 'Francisco',
                    'email' => 'Francisco@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('empleado');

                User::create([
                    'name' => 'Jorge Calderon',
                    'email' => 'Jorge@gmail.com',
                    'password' => bcrypt('12345678'),
                ])->assignRole('empleado');
        }
}
