<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('despezas', function (Blueprint $table) {
            $table->foreignId('tiputransaksaun_id')
                  ->after('data') 
                  ->constrained('tiputransaksauns')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::table('despezas', function (Blueprint $table) {
            $table->dropForeign(['tiputransaksaun_id']);
            $table->dropColumn('tiputransaksaun_id');
        });
    }
};
