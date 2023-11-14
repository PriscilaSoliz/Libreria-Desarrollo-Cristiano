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
        Schema::create('detalleventas', function (Blueprint $table) {
            $table->id();

            $table->decimal('precio');
            $table->integer('cantidad');
            $table->integer('descuento');
            $table->integer('subtotal');
            $table->unsignedBigInteger('venta_id');
            $table->unsignedBigInteger('producto_id');

            $table->foreign('venta_id')->references('id')->on('ventas');

            $table->foreign('producto_id')->references('id')->on('productos');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalleventas');
    }
};
