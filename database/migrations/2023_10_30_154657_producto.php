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
             $table->string('imagen')->nullable();
             $table->unsignedBigInteger('proveedor_id'); // Columna para la clave foránea
             $table->foreign('proveedor_id')->references('id')->on('provedors');
             $table->unsignedBigInteger('categoria_id');
             $table->foreign('categoria_id')->references('id')->on('categorias');
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
