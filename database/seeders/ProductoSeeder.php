<?php

namespace Database\Seeders;

use App\Models\producto;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        $user = producto::create([
            'codigo' => '97800829766813',
            'nombre' => 'Biblia nvi-un dia a la vez',
            'autor' => 'Saturnino Mamani',
            'version' => 'Nueva Version Internacional',
            'editorial' => 'Unilit',
            'precio' => '270',
            'cantidad' => '20',
            'ubicacion' => 'A',
            'proveedor_id'=> '1',
        ]);

        $user = producto::create([
            'codigo' => '9780789925855',
            'nombre' => 'Santa Biblia de la promesa',
            'autor' => 'Joaquin Chumacero',
            'version' => 'Reyna Valera 1960',
            'editorial' => 'Unilit',
            'precio' => '280',
            'cantidad' => '15',
            'ubicacion' => 'A',
            'proveedor_id'=> '2',
        ]);

        $user = producto::create([
            'codigo' => '9780789921567',
            'nombre' => 'Biblia de promesa',
            'autor' => 'Fabiola Mendez',
            'version' => 'Reyna Valera 1960',
            'editorial' => 'Unilit',
            'precio' => '200',
            'cantidad' => '5',
            'ubicacion' => 'A',
            'proveedor_id'=> '1',
        ]);


        $user = producto::create([
            'codigo' => '9780829748314',
            'nombre' => 'Mas Cerca de ti y de Dios',
            'autor' => 'Susie Shellenberguer',
            'version' => '1ra Edicion',
            'editorial' => 'Unilit',
            'precio' => '15',
            'cantidad' => '25',
            'ubicacion' => 'A2',
            'proveedor_id'=> '1',
        ]);


        $user = producto::create([
            'codigo' => '9781588024381',
            'nombre' => 'Cuando su pasado afecta su presente',
            'autor' => 'Sue Augustine',
            'version' => '2da Edicion',
            'editorial' => 'Unilit',
            'precio' => '95',
            'cantidad' => '30',
            'ubicacion' => 'A2',
            'proveedor_id'=> '1',
        ]);


        $user = producto::create([
            'codigo' => '9780789918536',
            'nombre' => 'Con quien me casare',
            'autor' => 'Luis Palau',
            'version' => '3ra Edicion',
            'editorial' => 'Unilit',
            'precio' => '90',
            'cantidad' => '35',
            'ubicacion' => 'A2',
            'proveedor_id'=> '2',
        ]);


        $user = producto::create([
            'codigo' => '614042004713',
            'nombre' => 'Taza LG',
            'autor' => 'Pedro Chumacero',
            'version' => '4rta Edicion',
            'editorial' => 'Unilit',
            'precio' => '10',
            'cantidad' => '40',
            'ubicacion' => 'B2',
            'proveedor_id'=> '3',
        ]);

        $user = producto::create([
            'codigo' => '7731641301173',
            'nombre' => 'Mochila',
            'autor' => 'karla yupanqui',
            'version' => '5ta Edicion',
            'editorial' => 'Unilit',
            'precio' => '90',
            'cantidad' => '45',
            'ubicacion' => 'B',
            'proveedor_id'=> '1',
        ]);

        $user = producto::create([
            'codigo' => '764283925404',
            'nombre' => 'Estuche de Lapices-Noe',
            'autor' => 'Carlos Camacho',
            'version' => '2da Edicion',
            'editorial' => 'Unilit',
            'precio' => '40',
            'cantidad' => '50',
            'ubicacion' => 'A2',
            'proveedor_id'=> '2',
        ]);
    }
}
