<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceInstall extends Model
{
    use HasFactory;

    protected $table = 'invoice_installs'; // table name database
    // protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nu_ref', 'data_faktura', 'data_limite_pagamentu','naran','residensia','nu_telfone', 
        'deskrisaun','subtotal', 'tax', 'maintenance', 'total','kliente_pakotes_id',
        'is_printed','period_month','period_year'
    ];

    public function klientePakotes()
    {
        return $this->hasMany(KlientePakotes::class, 'kliente_pakotes_id');
    }

    public function likidasaunInstalasaun()
{
    return $this->hasMany(likidasaun_instalasaun::class, 'invoice_installs_id');
}
}
