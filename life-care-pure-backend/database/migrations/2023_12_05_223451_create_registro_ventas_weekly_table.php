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
        Schema::create('RegistroVentasWeekly', function (Blueprint $table) {
            $table->id();
            $table->string('cliente_id');
            $table->unsignedInteger('fardos_in');
            $table->unsignedInteger('garrafas_in');
            $table->unsignedInteger('pet_in');
            $table->unsignedInteger('fardos_out');
            $table->unsignedInteger('garrafas_out');
            $table->unsignedInteger('pet_out');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('cliente_id')->references('unique_id')->on('clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('RegistroVentasWeekly');
    }
};
