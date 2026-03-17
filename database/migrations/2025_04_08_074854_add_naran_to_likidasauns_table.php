<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNaranToLikidasaunsTable extends Migration
{
    public function up()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->string('naran')->after('id'); 
        });
    }

    public function down()
    {
        Schema::table('likidasauns', function (Blueprint $table) {
            $table->dropColumn('naran');
        });
    }
}
