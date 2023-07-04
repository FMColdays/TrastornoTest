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
        Schema::create('opcion_selecionadas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opcion_id');
            $table->foreign('opcion_id')->references('id')->on('opcions')->onDelete('cascade');

            $table->unsignedBigInteger('test_realizado_id');
            $table->foreign('test_realizado_id')->references('id')->on('test_realizados')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opcion_selecionadas');
    }
};
