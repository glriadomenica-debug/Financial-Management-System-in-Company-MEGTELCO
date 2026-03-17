<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('likidasauns_install', function (Blueprint $table) {

            $table->dropColumn('tiputransaksaun');
            
            $table->unsignedBigInteger('metodu_pagamentu_id')->after('montante');

            $table->foreign('metodu_pagamentu_id')
                  ->references('id')
                  ->on('metodu_pagamentu')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('likidasauns_install', function (Blueprint $table) {
       
            $table->dropForeign(['metodu_pagamentu_id']);

            $table->dropColumn('metodu_pagamentu_id');

            $table->string('tiputransaksaun');
        });
    }
};