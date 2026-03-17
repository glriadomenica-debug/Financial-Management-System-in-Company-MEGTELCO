<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    public function up()
    {
        // Dapatkan nama foreign key
        $foreignKey = DB::select("
            SELECT CONSTRAINT_NAME 
            FROM INFORMATION_SCHEMA.KEY_COLUMN_USAGE 
            WHERE TABLE_NAME = 'invoice_installs' 
            AND COLUMN_NAME = 'kliente_pakote_id'
            LIMIT 1
        ")[0]->CONSTRAINT_NAME ?? null;
    
        // Drop foreign key jika ada
        if ($foreignKey) {
            Schema::table('invoice_installs', function (Blueprint $table) use ($foreignKey) {
                $table->dropForeign($foreignKey);
            });
        }
    
        // Rename column dengan syntax MariaDB
        DB::statement("
            ALTER TABLE invoice_installs 
            CHANGE kliente_pakote_id kliente_pakotes_id BIGINT UNSIGNED
        ");
    
        // Tambah foreign key baru
        Schema::table('invoice_installs', function (Blueprint $table) {
            $table->foreign('kliente_pakotes_id')
                ->references('id')
                ->on('kliente_pakotes')
                ->onDelete('cascade');
        });
    }
};
