<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlientePakotes extends Model
{
    use HasFactory;

    protected $table = 'kliente_pakotes'; 
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = [
        'kliente_id', 
        'pakote_id', 
        'nu_ref',
        'naran',
        'data',
        'nu_telfone',
        'residensia',
        'kapasidade',
        'presu_pakote',
        'presu_instalasaun',
        'status',
        'deactivated_at'
    ];
    public $timestamps = true;

public function scopeForInvoices($query, $month = null, $year = null)
{
    $month = $month ?? now()->month;
    $year = $year ?? now()->year;
    
    return $query->where(function($q) use ($month, $year) {
        $q->where('status', 'active')
          ->orWhere(function($query) use ($month, $year) {
            $query->where('status', 'inactive')
            ->where(function($q) use ($month, $year) {
                $q->whereNull('deactivated_at')
                ->orWhere(function($q) use ($month, $year) {
                $q->whereYear('deactivated_at', $year)
                ->whereMonth('deactivated_at', '>=', $month);
                });
                });
            });
    });
}

    // Relationship entre Kliente
    public function kliente()
    {
        return $this->belongsTo(Kliente::class, 'kliente_id');
    }

    // Relationship entre PakoteInternet
    public function pakote()
    {
        return $this->belongsTo(PakoteInternet::class, 'pakote_id');
    }

    public function invoice()
    {
        return $this->hasOne(Invoice::class, 'nu_ref', 'nu_ref');
    }

    public function invoices()
{
    return $this->hasMany(Invoice::class, 'kliente_pakotes_id');
}

public function invoicesInstalls()
{
    return $this->hasMany(InvoiceInstall::class, 'kliente_pakotes_id');
}

public function allInvoices()
{
    return $this->hasMany(Invoice::class, 'kliente_pakotes_id')->where('is_printed',true);
}


public function currentMonthInvoices()
{
    return $this->hasMany(Invoice::class, 'kliente_pakotes_id');
}

public function outstandingInvoices()
{
    return $this->hasMany(Invoice::class, 'kliente_pakotes_id');
}

public function printedInvoices()
{
    return $this->hasMany(Invoice::class, 'kliente_pakotes_id');
}
public function previousStatus()
{
    return $this->hasMany(StatusPagamentu::class, 'kliente_pakotes_id');
}


public function likidasauns()
{
    return $this->hasManyThrough(
        \App\Models\Likidasaun::class,
        \App\Models\Invoice::class,
        'kliente_pakotes_id', // foreign key invoice
        'invoice_id',         // foreign key likidasauns
        'id',                 // local key klientepakotes
        'id'                  // local key invoice
    );
}

public function likidasaunsInstalls()
{
    return $this->hasManyThrough(
        \App\Models\likidasaun_instalasaun::class,
        \App\Models\InvoiceInstall::class,
        'kliente_pakotes_id', // foreign key invoice_installs
        'invoice_installs_id',         // foreign key likidasauns
        'id',                 // local key klientepakotes
        'id'                  // local key invoice_installs
    );
}

public function statusPagamentus()
{
    return $this->hasMany(StatusPagamentu::class, 'kliente_pakotes_id');
}

}
