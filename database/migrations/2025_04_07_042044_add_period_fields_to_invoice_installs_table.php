<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('invoice_installs', function (Blueprint $table) {
            $table->integer('period_month')->after('is_printed')->nullable();
            $table->integer('period_year')->after('period_month')->nullable();
        });
    }

    public function down()
    {
        Schema::table('invoice_installs', function (Blueprint $table) {
            $table->dropColumn(['period_month', 'period_year']);
        });
    }
};