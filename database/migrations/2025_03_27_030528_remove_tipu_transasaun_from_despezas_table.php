<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('despezas', function (Blueprint $table) {
            $table->dropColumn('tipu_transasaun'); 
        });
    }

    public function down(): void
    {
        Schema::table('despezas', function (Blueprint $table) {
            $table->string('tipu_transasaun')->nullable(); 
        });
    }
};
