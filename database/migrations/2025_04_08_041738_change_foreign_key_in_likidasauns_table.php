<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->dropForeign(['kliente_id']);
            $table->dropColumn('kliente_id');
            $table->unsignedBigInteger('invoice_id')->after('metodu_pagamentu_id');
            $table->foreign('invoice_id')->references('id')->on('invoices')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->dropForeign(['invoice_id']);
            $table->dropColumn('invoice_id');
            
            $table->unsignedBigInteger('kliente_id')->after('metodu_pagamentu_id');
            $table->foreign('kliente_id')->references('id')->on('klientes')->onDelete('cascade');
        });
    }
};