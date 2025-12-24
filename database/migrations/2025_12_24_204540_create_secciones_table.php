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
        Schema::create('secciones', function (Blueprint $table) {
            $table->id();
            $table->foreignId('nave_id')->constrained('naves')->onDelete('cascade');
            $table->string('codigo', 20)->comment('Código de la sección: A, B, S01, 1A, etc.');
            $table->string('nombre', 100)->nullable()->comment('Nombre descriptivo de la sección');
            $table->timestamps();
            
            $table->unique(['nave_id', 'codigo']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('secciones');
    }
};
