<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venta;

class VentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {


        $user = Venta::create([
            'formapago'=>'Qr',
            'cliente_id' => '1398565',
            'usuario_id' => '1',


        ]);

    }

}
