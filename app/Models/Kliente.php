<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kliente extends Model
{
    use HasFactory;

    protected $table = 'klientes'; // table name database
    protected $primaryKey = 'id';
    public $incremeting = true;
    protected $fillable = [
        'nu_ref', 'data', 'naran', 'idcard_passport', 'nationality', 'residensia','kategoria', 
        'nu_telfone', 'email', 'profisaun'
    ];
    const NATIONALITIES = [
        'Timorense' => 'Timorense',
        'Indonesian' => 'Estrangeiro',
        'Portuguese' => 'Estrangeiro',
        'Australian' => 'Estrangeiro',
        'Filipina'=> 'Estrangeiro',
        'China'=>'Estrangeiro',
    ];
    
    public $timestamps = false;

//     public function pakote()
// {
//     return $this->belongsTo(PakoteInternet::class, 'pakote_id');
// }
   // Relationship entre KlientePakotes (kliente 1 bele hili pakote barak))
   public function getNationalityTypeAttribute()
{
    return $this->nationality === 'Timoroan' ? 'Timoroan' : 'Estrangeiro';
}
   public function klientepakotes()
   {
       return $this->hasMany(KlientePakotes::class, 'kliente_id');
   }
public function invoices()
{
    return $this->hasMany(Invoice::class, 'kliente_id');
}

// public function likidasauns()
// {
//     return $this->hasMany(Likidasaun::class);
// }

// public function pakotes()
// {
//     return $this->belongsToMany(PakoteInternet::class, 'kliente_pakotes', 'kliente_id', 'pakote_id');
// }

}


