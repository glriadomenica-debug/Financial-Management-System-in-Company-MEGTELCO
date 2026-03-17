<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLikidasaunsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('likidasauns', function (Blueprint $table) {
            $table->id();  
            $table->date('data_likidasaun');  
            $table->string('deskrisaun');  
            $table->decimal('montante', 10, 2); 
            $table->unsignedBigInteger('kliente_id'); 
            $table->timestamps();  

         
            $table->foreign('kliente_id')->references('id')->on('klientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('likidasauns');
    }
}
