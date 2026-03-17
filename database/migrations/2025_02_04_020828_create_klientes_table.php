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
        Schema::create('klientes', function (Blueprint $table) {
            $table->id();
            $table->string('nu_ref')->unique(); // Nomor referensi uniku
            $table->date('data'); 
            $table->string('naran'); 
            $table->string('id/passport');
            $table->string('residensia'); 
            $table->string('pakote'); 
            $table->string('kapasidade');
            $table->decimal('presu_pakote', 10, 2); 
            $table->decimal('presu_instalasaun', 10, 2); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('klientes');
    }
};
