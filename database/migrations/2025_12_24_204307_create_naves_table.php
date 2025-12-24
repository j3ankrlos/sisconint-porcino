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
        Schema::create('naves', function (Blueprint $table) {
            $table->id();
            $table->foreignId('granja_id')->constrained('granjas')->onDelete('cascade');
            $table->string('codigo', 20)->comment('Código de la nave: G1, G2, M1, etc.');
            $table->string('nombre', 100)->nullable()->comment('Nombre descriptivo de la nave');
            $table->timestamps();
            
            $table->unique(['granja_id', 'codigo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('naves');
    }
};
