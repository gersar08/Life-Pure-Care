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
            $table->string('reference_code');
            $table->unsignedBigInteger('inventario_id');
            $table->decimal('precio', 8, 2);
            $table->foreign('reference_code')->references('reference_code')->on('clientes')->onDelete('cascade');
            $table->foreign('inventario_id')->references('id')->on('inventarios')->onDelete('cascade');
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
