<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('StatusPagamentus', function (Blueprint $table) {
            $table->id();
            $table->string('nu_ref');
            $table->string('naran'); 
            $table->string('pakote'); 
            $table->decimal('new_installation', 10, 2)->default(0); 
            $table->decimal('outstanding_payment', 10, 2)->default(0); 
            $table->decimal('invoice_fulan', 10, 2)->default(0); 
            $table->decimal('total_faktura', 10, 2)->default(0); // Total geral
            $table->decimal('selu_ona', 10, 2)->default(0); // Total pagamentu
            $table->date('data_selu')->nullable(); // Data pagamentu
            $table->decimal('iha_devida', 10, 2)->default(0); // Saldu devida
            $table->foreignId('kliente_pakotes_id')->nullable()->constrained('kliente_pakotes')->onDelete('set null');
            $table->foreignId('invoice_id')->nullable()->constrained('invoices')->onDelete('set null');
            $table->foreignId('invoice_installs_id')->nullable()->constrained('invoice_installs')->onDelete('set null');
            $table->foreignId('likidasauns_id')->nullable()->constrained('likidasauns')->onDelete('set null');
            $table->foreignId('likidasauns_install_id')->nullable()->constrained('likidasauns_install')->onDelete('set null');
            $table->timestamps();
            
           
        });
    }

    public function down()
    {
        Schema::dropIfExists('StatusPagamentus');
    }
    

};
