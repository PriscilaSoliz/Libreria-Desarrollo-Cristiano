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
        Schema::create('detallecompras', function (Blueprint $table) {
            $table->id();
           
            $table->decimal('precio');
            $table->integer('cantidad');
            $table->integer('subtotal');
            $table->unsignedBigInteger('compra_id');
            $table->unsignedBigInteger('producto_id');

            $table->foreign('compra_id')->references('id')->on('compras');

            $table->foreign('producto_id')->references('id')->on('productos');

            $table->timestamps();
        });
         // Agrega el trigger después de crear la tabla 'detallecompras'
         \DB::unprepared('
         CREATE TRIGGER aumentar_stock AFTER INSERT ON detallecompras
         FOR EACH ROW
         BEGIN
             UPDATE productos
             SET cantidad = cantidad + NEW.cantidad
             WHERE id = NEW.producto_id;
         END
     ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detallecompras');
    }
};
