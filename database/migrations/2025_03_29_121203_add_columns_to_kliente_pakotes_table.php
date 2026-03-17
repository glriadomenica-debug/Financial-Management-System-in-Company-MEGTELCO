<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('kliente_pakotes', function (Blueprint $table) {
            $table->string('nu_ref')->after('pakote_id');
            $table->string('naran')->after('nu_ref');
            $table->date('data')->after('naran');
            $table->string('kapasidade')->after('data');
            $table->decimal('presu_pakote', 10, 2)->after('kapasidade');
            $table->decimal('presu_instalasaun', 10, 2)->after('presu_pakote');
        });
    }

    public function down(): void
    {
        Schema::table('kliente_pakotes', function (Blueprint $table) {
            $table->dropColumn(['nu_ref', 'naran', 'data', 'kapasidade', 'presu_pakote', 'presu_instalasaun']);
        });
    }
};
