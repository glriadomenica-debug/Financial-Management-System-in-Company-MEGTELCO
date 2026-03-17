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
            // First check if the column exists before trying to drop it
            if (Schema::hasColumn('likidasauns_install', 'kliente_id')) {
                // Try to drop foreign key first if it exists
                // $table->dropForeign(['kliente_id']);
                $table->dropColumn('kliente_id');
            }
            
            // Only add new column if it doesn't exist
            if (!Schema::hasColumn('likidasauns_install', 'invoice_installs_id')) {
                $table->unsignedBigInteger('invoice_installs_id')->after('metodu_pagamentu_id')->nullable();
            }
            
            // Add foreign key constraint if it doesn't exist
            if (!Schema::hasColumn('likidasauns_install', 'invoice_installs_id')) {
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
            // Drop foreign key if it exists
            $table->dropForeign(['invoice_installs_id']);
            
            // Drop column if it exists
            if (Schema::hasColumn('likidasauns_install', 'invoice_installs_id')) {
                $table->dropColumn('invoice_installs_id');
            }
            
            // Re-add old column
            if (!Schema::hasColumn('likidasauns_install', 'kliente_id')) {
                $table->unsignedBigInteger('kliente_id')->after('metodu_pagamentu_id');
                $table->foreign('kliente_id')
                      ->references('id')
                      ->on('klientes')
                      ->onDelete('cascade');
            }
        });
    }
};