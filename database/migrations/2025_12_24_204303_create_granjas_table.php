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
        Schema::create('granjas', function (Blueprint $table) {
            $table->id();
            $table->string('codigo', 10)->unique()->comment('Código de la granja: EST, EXP');
            $table->string('nombre', 100)->comment('Nombre descriptivo de la granja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('granjas');
    }
};
