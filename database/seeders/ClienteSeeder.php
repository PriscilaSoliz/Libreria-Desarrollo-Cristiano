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
        $user = cliente::create([
            'ci'=>'1597323',
            'nombre' => 'priscilo',
            'celular' => '78056030',

            'direccion' => 'barrio calama',
            'correo'=> 'fideito123@gmail.com',

        ]);
        $user = cliente::create([
            'ci'=>'1398565',
            'nombre' => 'daniela',
            'celular' => '12758899',

            'direccion' => 'la villa',
            'correo'=> 'fideito1234@gmail.com',

        ]);
    }
}
