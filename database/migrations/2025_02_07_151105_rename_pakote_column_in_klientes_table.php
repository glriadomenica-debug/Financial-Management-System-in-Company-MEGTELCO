<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    
    public function up(): void
    {
        DB::statement('ALTER TABLE klientes CHANGE COLUMN pakote pakote_id VARCHAR(255) NULL');
    }

    
    public function down(): void
    {
        DB::statement('ALTER TABLE klientes CHANGE COLUMN pakote_id pakote VARCHAR(255) NULL');
    }
};
