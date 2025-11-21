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
        Schema::create('obras', function (Blueprint $table) {
        $table->id();
        $table->string('titulo');
        $table->foreignId('artist_id')->constrained('artists')->onDelete('cascade');
        $table->integer('ano')->nullable();
        $table->string('tecnica')->nullable();
        $table->string('imagem')->nullable(); // opcional
        $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obras');
    }
};
