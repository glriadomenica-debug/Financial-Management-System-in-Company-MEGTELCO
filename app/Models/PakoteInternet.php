<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PakoteInternet extends Model
{
    use HasFactory;

    protected $table = 'pakote_internet'; // tabela database
    protected $fillable = ['pakote', 'presu', 'kapasidade','kustu_manutensaun']; // Koluna
    public $timestamps = false;

      // Relationship entre KlientePakotes
      public function klientepakotes()
      {
          return $this->hasMany(KlientePakotes::class, 'pakote_id');
      }

      
}
