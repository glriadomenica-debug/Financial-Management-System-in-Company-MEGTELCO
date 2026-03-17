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
        Schema::table('depositus', function (Blueprint $table) {
            $table->unsignedBigInteger('tipu_depositu_id')->change();

            $table->foreign('tipu_depositu_id')
                  ->references('id')
                  ->on('tipu__depositus')
                  ->onDelete('restrict'); //  'cascade' 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('depositus', function (Blueprint $table) {
            $table->dropForeign(['tipu_depositu_id']);
 
            $table->string('tipu_depositu_id')->change();
        });
    }
};