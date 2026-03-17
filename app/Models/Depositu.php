<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depositu extends Model
{
    use HasFactory;
    protected $table = 'depositus';
    protected $fillable = ['data_depositu', 'tipu_depositu_husi_id',
    'tipu_depositu_ba_id','montante', 'levantamento','bank_charge',
        'deskrisaun',
        'referencia'];

    // public function tipu_depositu()
    // {
    //     return $this->belongsTo(Tipu_Depositu::class, 'tipu_depositu_id');
    // }

    protected $casts = [
        'data_depositu' => 'date',
        'levantamento' => 'boolean',
        'bank_charge'=>'boolean',
    ];
    public function tipu_depositu_husi()
{
    return $this->belongsTo(Tipu_Depositu::class, 'tipu_depositu_husi_id');
}

public function tipu_depositu_ba()
{
    return $this->belongsTo(Tipu_Depositu::class, 'tipu_depositu_ba_id');
}
}
