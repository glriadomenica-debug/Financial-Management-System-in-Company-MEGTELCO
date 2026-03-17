<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class likidasaun_instalasaun extends Model
{
    use HasFactory;

    protected $table = 'likidasauns_install';
    protected $fillable = [ 'deskrisaun','montante', 'metodu_pagamentu_id','data',
'invoice_installs_id','naran'];

    public function kliente()
    {
        return $this->belongsTo(Kliente::class, 'kliente_id');
    }

    public function metoduPagamentu()
    {
        return $this->belongsTo(MetoduPagamentu::class, 'metodu_pagamentu_id');
    }

    public function invoiceInstall()
    {
        return $this->belongsTo(InvoiceInstall::class, 'invoice_installs_id');  
    }

//     public function metodupagamento()
//     {
//         return $this->belongsTo(MetoduPagamentu::class, 'metodu_pagamentu_id');
//     }
}
