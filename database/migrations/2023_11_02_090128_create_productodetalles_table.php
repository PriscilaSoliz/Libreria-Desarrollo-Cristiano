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
        Schema::create('productodetalles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('producto_id');
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('detallecategoria_id');
            $table->timestamps();
            $table->foreign('producto_id')->references('id')->on('productos');
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('detallecategoria_id')->references('id')->on('detallecategorias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productodetalles');
    }
};
