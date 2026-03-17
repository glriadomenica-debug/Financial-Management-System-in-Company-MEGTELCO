<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->unsignedBigInteger('kliente_id');
        $table->foreign('kliente_id')->references('id')->on('klientes')->onDelete('cascade');
    });
}

public function down()
{
    Schema::table('invoices', function (Blueprint $table) {
        $table->dropForeign(['kliente_id']);
        $table->dropColumn('kliente_id');
    });
}

};
