<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->string('tipu_transaksaun')->after('deskrisaun')->nullable();
        });
    }

    public function down()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->dropColumn('tipu_transaksaun');
        });
    }
    
};
