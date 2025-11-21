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
         Schema::create('exposicao_obra', function (Blueprint $table) {
        $table->id();
        $table->foreignId('exposicao_id')->constrained('exposicaos')->onDelete('cascade');
        $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');
        $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exposicao_obra');
    }
};
