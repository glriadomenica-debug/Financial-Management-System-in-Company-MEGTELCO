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
        Schema::create('likidasauns_install', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kliente_id'); 
            $table->string('deskrisaun');  
            $table->decimal('montante', 10, 2);
            $table->string('tiputransaksaun');
            $table->date('data');  
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likidasauns_install');
    }
};
