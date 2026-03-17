<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('likidasauns_install', function (Blueprint $table) {
            $table->dropColumn('tiputransaksaun');
        });
    }

    public function down()
    {
        Schema::table('likidasauns_install', function (Blueprint $table) {
            $table->string('tiputransaksaun')->after('montante');
        });
    }
};