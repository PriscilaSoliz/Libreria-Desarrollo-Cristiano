<?php

namespace Database\Seeders;
use App\Models\Compra;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = Compra::create([
            'formapago'=>'efectivo',
            'proveedor_id' => '1',
        ]);

    }
}
