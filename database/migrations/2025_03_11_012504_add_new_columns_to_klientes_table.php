<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Cek dan tambahkan kolom hanya jika belum ada
        DB::statement('
            ALTER TABLE klientes 
            ADD COLUMN IF NOT EXISTS idcard_passport VARCHAR(255) NULL AFTER naran,
            ADD COLUMN IF NOT EXISTS nationality VARCHAR(255) NULL AFTER idcard_passport,
            ADD COLUMN IF NOT EXISTS profisaun VARCHAR(255) NULL AFTER nu_telfone
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Hapus kolom jika ada
        DB::statement('
            ALTER TABLE klientes
            DROP COLUMN IF EXISTS idcard_passport,
            DROP COLUMN IF EXISTS nationality,
            DROP COLUMN IF EXISTS profisaun
        ');
    }
};
