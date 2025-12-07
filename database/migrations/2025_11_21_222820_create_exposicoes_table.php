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
        Schema::create('exposicoes', function (Blueprint $table) {
    $table->id();
    $table->foreignId('obra_id')->constrained('obras')->onDelete('cascade');
    $table->string('nome');
    $table->string('local');
    $table->date('data_inicio');
    $table->date('data_fim');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exposicoes');
    }
};
