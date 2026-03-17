<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Hapus foreign key terlebih dahulu
            $table->dropForeign(['kliente_id']);

            // Hapus kolom kliente_id
            $table->dropColumn('kliente_id');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            // Tambahkan kembali kolom kliente_id jika rollback
            $table->unsignedBigInteger('kliente_id')->after('id');
            $table->foreign('kliente_id')->references('id')->on('klientes')->onDelete('cascade');
        });
    }
};
