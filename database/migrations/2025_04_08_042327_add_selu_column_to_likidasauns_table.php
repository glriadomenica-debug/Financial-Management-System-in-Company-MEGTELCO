<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->decimal('selu', 10, 2)->default(0)->after('montante');
        });
    }

    public function down()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->dropColumn('selu');
        });
    }
};