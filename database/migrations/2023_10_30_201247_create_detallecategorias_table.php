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
        Schema::create('detallecategorias', function (Blueprint $table) {
            $table->unsignedBigInteger('id');
            $table->unsignedBigInteger('categoria_id');
            $table->string('descripcion');
            $table->unsignedBigInteger('producto_id');
            $table->timestamps();

            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->foreign('producto_id')->references('id')->on('productos');
        });

        // Definir las columnas como claves primarias compuestas
        DB::statement('ALTER TABLE detallecategorias ADD PRIMARY KEY (id, categoria_id)');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallecategorias');
    }
};
