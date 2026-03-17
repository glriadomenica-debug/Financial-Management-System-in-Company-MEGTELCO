<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetoduPagamentu extends Model
{
    use HasFactory;
    protected $table = 'metodu_pagamentus';
    protected $fillable = ['metodu_selu'];

    // public function likins()
    // {
    //     return $this->belongsTo(likidasaun_instalasaun::class, 'likidasaun_instalasaun_id');
    // }
}


