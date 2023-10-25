<?php

namespace Database\Seeders;

use App\Models\empleado;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EmpleadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {

        $user = empleado::create([
            'ci'=>'1597323',
            'nombre' => 'arnaldo',
            'celular' => '78056030',
            'correo' => 'arnaldo@gmail.com',
            'direccion' => 'barrio calama',
            'cargo' => 'vendedor',
        ]);
        $user = empleado::create([
            'ci'=>'1398565',
            'nombre' => 'prisilo',
            'celular' => '12758899',
            'correo' => 'prisilo@gmail.com',
            'direccion' => 'la villa',
            'cargo' => 'almacenador',
        ]);
        $user = empleado::create([
            'ci'=>'1345565',
            'nombre' => 'cristhian',
            'celular' => '19013411',
            'correo' => 'cristhian@gmail.com',
            'direccion' => 'la guardia',
            'cargo' => 'almacenador',
        ]);
        $user = empleado::create([
            'ci'=>'1003565',
            'nombre' => 'anastacia',
            'celular' => '72153351',
            'correo' => 'anastacia@gmail.com',
            'direccion' => '5to anillo',
            'cargo' => 'vendedor',
        ]);
        $user = empleado::create([
            'ci'=>'1012565',
            'nombre' => 'enrique',
            'celular' => '78921211',
            'correo' => 'enrique@gmail.com',
            'direccion' => 'av. Cumavi',
            'cargo' => 'vendedor',
        ]);
        $user = empleado::create([
            'ci'=>'1337865',
            'nombre' => 'miguel',
            'celular' => '79361091',
            'correo' => 'miguel@gmail.com',
            'direccion' => 'cotoca',
            'cargo' => 'vendedor',
        ]);
        $user = empleado::create([
            'ci'=>'1899965',
            'nombre' => 'fabiana',
            'celular' => '18951201',
            'correo' => 'fabiana@gmail.com',
            'direccion' => 'el valcon',
            'cargo' => 'almacenador',
        ]);
    }
}
