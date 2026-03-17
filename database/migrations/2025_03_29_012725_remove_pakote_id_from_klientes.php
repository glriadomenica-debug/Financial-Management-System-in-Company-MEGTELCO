<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            // Periksa apakah foreign key ada sebelum menghapusnya
            $foreignKeys = DB::select("SELECT CONSTRAINT_NAME
                FROM information_schema.KEY_COLUMN_USAGE
                WHERE TABLE_NAME = 'klientes' AND COLUMN_NAME = 'pakote_id'");

            if (!empty($foreignKeys)) {
                $table->dropForeign(['pakote_id']);
            }

            // Periksa apakah kolom ada sebelum menghapusnya
            if (Schema::hasColumn('klientes', 'pakote_id')) {
                $table->dropColumn('pakote_id');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            if (!Schema::hasColumn('klientes', 'pakote_id')) {
                $table->unsignedBigInteger('pakote_id')->nullable()->after('email');
                $table->foreign('pakote_id')->references('id')->on('pakote_internet')->onDelete('set null');
            }
        });
    }
};
