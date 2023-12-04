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
             $table->integer('cantidad')->nullable();
             $table->string('ubicacion')->nullable();
             $table->string('imagen')->nullable();
             $table->unsignedBigInteger('proveedor_id')->nullable(); // Columna para la clave foránea
             $table->foreign('proveedor_id')->references('ci')->on('provedors');
             $table->unsignedBigInteger('categoria_id')->nullable();
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
