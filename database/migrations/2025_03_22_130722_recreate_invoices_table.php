<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::dropIfExists('invoices'); 

        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('nu_ref')->unique();
            $table->date('data_faktura');
            $table->date('data_limite_pagamentu');
            $table->string('naran');
            $table->string('residensia');
            $table->string('nu_telfone');
            $table->json('deskrisaun'); 
            $table->string('kapasidade');
            $table->decimal('subtotal', 10, 2);
            $table->decimal('tax', 10, 2);
            $table->decimal('maintenance', 10, 2);
            $table->decimal('total', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('invoices');
    }
};
