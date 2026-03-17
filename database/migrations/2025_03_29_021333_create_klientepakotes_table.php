<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kliente_pakotes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kliente_id');
            $table->unsignedBigInteger('pakote_id');

            // Foreign key ba tabel klientes
            $table->foreign('kliente_id')->references('id')->on('klientes')->onDelete('cascade');

            // Foreign key ba  tabel pakote_internet
            $table->foreign('pakote_id')->references('id')->on('pakote_internet')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kliente_pakotes');
    }
};
