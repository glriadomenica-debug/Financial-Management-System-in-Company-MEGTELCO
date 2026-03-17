<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            if (Schema::hasColumn('klientes', 'pakote')) {
                $table->dropColumn('pakote');
            }
            if (Schema::hasColumn('klientes', 'kapasidade')) {
                $table->dropColumn('kapasidade');
            }
            if (Schema::hasColumn('klientes', 'presu_pakote')) {
                $table->dropColumn('presu_pakote');
            }
            if (Schema::hasColumn('klientes', 'presu_instalasaun')) {
                $table->dropColumn('presu_instalasaun');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('klientes', function (Blueprint $table) {
            if (!Schema::hasColumn('klientes', 'pakote')) {
                $table->string('pakote')->nullable();
            }
            if (!Schema::hasColumn('klientes', 'kapasidade')) {
                $table->string('kapasidade')->nullable();
            }
            if (!Schema::hasColumn('klientes', 'presu_pakote')) {
                $table->decimal('presu_pakote', 10, 2)->nullable();
            }
            if (!Schema::hasColumn('klientes', 'presu_instalasaun')) {
                $table->decimal('presu_instalasaun', 10, 2)->nullable();
            }
        });
    }
};
