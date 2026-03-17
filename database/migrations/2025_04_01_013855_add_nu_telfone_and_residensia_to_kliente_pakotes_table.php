<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('kliente_pakotes', function (Blueprint $table) {
            $table->string('nu_telfone')->after('data')->nullable();
            $table->string('residensia')->after('nu_telfone')->nullable();
        });
    }

    public function down()
    {
        Schema::table('kliente_pakotes', function (Blueprint $table) {
            $table->dropColumn(['nu_telfone', 'residensia']);
        });
    }
};

