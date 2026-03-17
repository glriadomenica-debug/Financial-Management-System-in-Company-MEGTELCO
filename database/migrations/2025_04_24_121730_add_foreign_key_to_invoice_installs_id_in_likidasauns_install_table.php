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
        Schema::table('likidasauns_install', function (Blueprint $table) {
            if (Schema::hasColumn('likidasauns_install', 'invoice_installs_id')) {
                $table->foreign('invoice_installs_id')
                      ->references('id')
                      ->on('invoice_installs')
                      ->onDelete('cascade');
            }
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('likidasauns_install', function (Blueprint $table) {
            $table->dropForeign(['invoice_installs_id']);
            
        });
    }
};