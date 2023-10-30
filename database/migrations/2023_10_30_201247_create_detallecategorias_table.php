<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        Schema::create('detallecategorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('categoria_id');
            $table->string('descripcion');
            $table->unsignedBigInteger('producto_id');

            $table->timestamps();
            $table->foreign('categoria_id')->references('id')->on('categorias'); // Hacer referencia a la clave primaria 'id' de 'categorias'
            // Columna para la clave foránea a productos

             $table->foreign('producto_id')->references('id')->on('productos'); // Hacer referencia a la clave primaria 'id' de 'productos'


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallecategorias');
    }
};
