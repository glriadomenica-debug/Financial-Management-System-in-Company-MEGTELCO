<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->smallInteger('period_month')->after('nu_ref');
            $table->smallInteger('period_year')->after('period_month');
            $table->dropUnique(['nu_ref']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->dropColumn(['period_month', 'period_year']); 
            $table->unique('nu_ref');
        });
    }
};
