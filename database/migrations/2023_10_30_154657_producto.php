<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

     public function up()
     {
         Schema::create('productos', function (Blueprint $table) {
             $table->id();
             $table->string('codigo');
             $table->string('nombre');
             $table->string('autor')->nullable();
             $table->string('version')->nullable();
             $table->string('editorial');
             $table->decimal('precio');
             $table->integer('cantidad');
             $table->string('ubicacion');
             $table->unsignedBigInteger('proveedor_id'); // Columna para la clave foránea

             $table->foreign('proveedor_id')->references('id')->on('provedors'); // Hacer referencia a la clave primaria 'id' de 'proveedores'

             $table->timestamps();
         });
     }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
