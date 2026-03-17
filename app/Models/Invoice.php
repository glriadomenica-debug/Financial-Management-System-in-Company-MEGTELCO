<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoices'; // table name database
    // protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'nu_ref', 'data_faktura', 'data_limite_pagamentu', 
        'deskrisaun','subtotal', 'tax', 'maintenance', 'total','kliente_pakotes_id',
        'period_month','period_year','is_printed'
    ];

    // public function kliente()
    // {
    //     return $this->belongsTo(Kliente::class, 'kliente_id');
    // }
    
    public function klientePakotes()
{
    return $this->belongsTo(KlientePakotes::class, 'kliente_pakotes_id');
}
public function likidasauns()
{
    return $this->hasMany(Likidasaun::class,'invoice_id');
}
}
