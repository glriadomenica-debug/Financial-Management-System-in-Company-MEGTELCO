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
        Schema::table('pakote_internet', function (Blueprint $table) {
            $table->decimal('kustu_manutensaun',10,2)->nullable()->after('kapasidade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pakote_internet', function (Blueprint $table) {
            $table->dropColumn('kustu_manutensaun');
        });
    }
};
