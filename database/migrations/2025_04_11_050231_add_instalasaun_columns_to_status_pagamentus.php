<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('StatusPagamentus', function (Blueprint $table) {
            $table->decimal('selu_instalasaun', 10, 2)->default(0)->after('data_selu');
            $table->date('data_selu_instalasaun')->nullable()->after('selu_instalasaun');
        });
    }

    public function down()
    {
        Schema::table('StatusPagamentus', function (Blueprint $table) {
            $table->dropColumn(['selu_instalasaun', 'data_selu_instalasaun']);
        });
    }
};