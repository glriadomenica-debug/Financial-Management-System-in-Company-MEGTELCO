<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
    
        if (Schema::hasColumn('invoice_installs', 'kliente_pakote_id')) {

            Schema::table('invoice_installs', function (Blueprint $table) {
                $table->dropForeign(['kliente_pakote_id']);
                $table->renameColumn('kliente_pakote_id', 'kliente_pakotes_id');
                $table->foreign('kliente_pakotes_id')
                    ->references('id')
                    ->on('kliente_pakotes')
                    ->onDelete('cascade');
            });
        }
    }
    
    public function down()
    {
        
    }
};