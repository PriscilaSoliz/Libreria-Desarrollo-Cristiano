<?php

namespace Database\Seeders;

use App\Models\Provedor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Proveedor extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Provedor::create([
            'ci'=>'1597323',
            'nombre' => 'priscilo',
            'celular' => '78056030',

            'direccion' => 'barrio calama',

        ]);
        $user = Provedor::create([
            'ci'=>'1398565',
            'nombre' => 'daniela',
            'celular' => '12758899',

            'direccion' => 'la villa',

        ]);
        $user = Provedor::create([
            'ci'=>'1345565',
            'nombre' => 'jorga',
            'celular' => '19013411',
            'direccion' => 'la guardia',

        ]);
    }
}
