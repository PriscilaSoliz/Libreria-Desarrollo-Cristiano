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

            'correo' => 'barrio calama',

        ]);
        $user = cliente::create([
            'ci'=>'1398565',
            'nombre' => 'daniela',
            'celular' => '12758899',

            'correo' => 'la villa',

        ]);
    }
}
