<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->unsignedBigInteger('kliente_pakotes_id')->after('nu_ref')->nullable();
            $table->foreign('kliente_pakotes_id')->references('id')->on('kliente_pakotes')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropForeign(['kliente_pakotes_id']);
            $table->dropColumn('kliente_pakotes_id');
        });
    }
};


