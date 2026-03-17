<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Likidasaun extends Model
{
    use HasFactory;
    protected $table = 'likidasauns';
    protected $fillable = ['data_likidasaun','naran','deskrisaun','montante', 
    'invoice_id', 'selu','metodu_pagamentu_id'];

    public function kliente()
    {
        return $this->belongsTo(Kliente::class, 'kliente_id');
    }
    public function metoduPagamentu()
    {
        return $this->belongsTo(MetoduPagamentu::class, 'metodu_pagamentu_id');
    }
    public function invoices()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

}
