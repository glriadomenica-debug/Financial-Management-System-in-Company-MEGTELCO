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
        Schema::table('depositus', function (Blueprint $table) {
            $table->foreignId('tipu_depositu_husi_id')->nullable()->constrained('tipu__depositus');
            $table->foreignId('tipu_depositu_ba_id')->nullable()->constrained('tipu__depositus');
            $table->dropForeign(['tipu_depositu_id']);
            $table->dropColumn('tipu_depositu_id');
        });
    }
    
    public function down()
    {
        Schema::table('depositus', function (Blueprint $table) {
            $table->foreignId('tipu_depositu_id')->nullable()->constrained('tipu__depositus');
            $table->dropForeign(['tipu_depositu_husi_id']);
            $table->dropForeign(['tipu_depositu_ba_id']);
            $table->dropColumn(['tipu_depositu_husi_id', 'tipu_depositu_ba_id']);
        });
    }
};
