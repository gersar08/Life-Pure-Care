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
        Schema::create('precios_especiales', function (Blueprint $table) {
            $table->id();
            $table->foreignId('unique_id')->constrained('clientes');
            $table->foreignId('producto_id')->constrained('productos');
            $table->decimal('precio_especial', 8, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('precios_especiales');
    }
};
