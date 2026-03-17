<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLevantamentoToDepositusTable extends Migration
{
    public function up()
    {
        Schema::table('depositus', function (Blueprint $table) {
            $table->boolean('levantamento')->default(false);
            $table->text('deskrisaun')->nullable();
            $table->string('referencia')->nullable();
        });
    }

    public function down()
    {
        Schema::table('depositus', function (Blueprint $table) {
            $table->dropColumn(['levantamento', 'deskrisaun', 'referencia']);
        });
    }
}