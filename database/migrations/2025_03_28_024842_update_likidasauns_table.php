<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
          
            $table->dropColumn('tipu_transaksaun');

            $table->unsignedBigInteger('metodu_pagamentu_id')->after('deskrisaun')->nullable();

            $table->foreign('metodu_pagamentu_id')->references('id')->on('metodu_pagamentus')->onDelete('set null');
        });
    }

    public function down()
    {
        Schema::table('likidasauns', function (Blueprint $table) {

            $table->dropForeign(['metodu_pagamentu_id']);
            $table->dropColumn('metodu_pagamentu_id');

            $table->string('tipu_transaksaun')->nullable();
        });
    }
};
