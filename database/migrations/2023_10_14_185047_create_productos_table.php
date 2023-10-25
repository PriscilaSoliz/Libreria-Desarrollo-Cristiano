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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->String('codigo');
            $table->String('nombre');
            $table->string('autor')->nullable();
            $table->String('version')->nullable();
            $table->String('editorial');
            $table->Decimal('precio');
            $table->integer('cantidad');
            $table->String('ubicacion');


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
