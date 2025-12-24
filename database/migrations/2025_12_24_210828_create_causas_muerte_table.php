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
        Schema::create('causas_muerte', function (Blueprint $table) {
            $table->id();
            $table->string('causa', 100)->comment('Causa de muerte');
            $table->string('sistema', 50)->comment('Sistema afectado');
            $table->timestamps();
            
            $table->unique(['causa', 'sistema']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('causas_muerte');
    }
};
