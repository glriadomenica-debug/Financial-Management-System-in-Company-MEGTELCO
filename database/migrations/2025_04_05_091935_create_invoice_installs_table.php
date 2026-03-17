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
        Schema::create('invoice_installs', function (Blueprint $table) {
            $table->id();
            $table->string('nu_ref')->unique();
            $table->date('data_faktura');
            $table->date('data_limite_pagamentu');
            $table->string('naran');
            $table->string('residensia');
            $table->string('nu_telfone');
            $table->string('deskrisaun');
            $table->foreignId('kliente_pakote_id')
                  ->constrained('kliente_pakotes')
                  ->onDelete('cascade')
                  ->comment('Related client package');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('maintenance', 10, 2);
            $table->decimal('total', 10, 2);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_installs');
    }
};
