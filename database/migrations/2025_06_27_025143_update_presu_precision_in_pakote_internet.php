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
        Schema::table('pakote_internet', function (Blueprint $table) {
            $table->decimal('presu', 10, 3)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('pakote_internet', function (Blueprint $table) {
            $table->decimal('presu', 10, 2)->change();
        });
    }
};

