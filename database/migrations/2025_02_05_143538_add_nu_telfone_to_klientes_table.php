<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            $table->string('nu_telfone')->after('residensia');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            $table->dropColumn('nu_tefone');
        });
    }
};
