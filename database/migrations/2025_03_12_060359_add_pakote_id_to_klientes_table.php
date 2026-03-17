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
        // Periksa apakah kolom 'pakote_id' sudah ada di tabel 'klientes'
        if (!Schema::hasColumn('klientes', 'pakote_id')) {
            Schema::table('klientes', function (Blueprint $table) {
                // Menambahkan kolom 'pakote_id' sebagai foreign key
                $table->unsignedBigInteger('pakote_id')->nullable()->after('email');
                
                // Menambahkan foreign key jika kolom pakote_id belum ada
                $table->foreign('pakote_id')->references('id')->on('pakote_internet')->onDelete('set null');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            // Hapus foreign key dan kolom 'pakote_id' jika migrasi dibatalkan
            $table->dropForeign(['pakote_id']);
            $table->dropColumn('pakote_id');
        });
    }
};
