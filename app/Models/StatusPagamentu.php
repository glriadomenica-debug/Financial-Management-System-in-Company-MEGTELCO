<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatusPagamentu extends Model
{
    use HasFactory;
    protected $table='statuspagamentus';
    protected $fillable=['nu_ref','naran','pakote','new_installation','outstanding_payment',
    'invoice_fulan','total_faktura','selu_ona','data_selu','iha_devida',
    'kliente_pakotes_id','invoice_id','invoice_installs_id','likidasauns_id','likidasauns_install_id',
    'selu_instalasaun','data_selu_instalasaun','month','year'];

    // relationship 
    public function klientePakote()
    {
        return $this->belongsTo(KlientePakotes::class, 'kliente_pakotes_id');
    }
    // Relationship ho Invoice
    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    // Relationship ho InvoiceInstall
    public function invoiceInstall()
    {
        return $this->belongsTo(InvoiceInstall::class, 'invoice_installs_id');
    }

    // Relationship ho Likidasaun 
    public function likidasaun()
    {
        return $this->belongsTo(Likidasaun::class, 'likidasauns_id');
    }

    // Relationship ho LikidasaunInstalasaun 
    public function likidasaunInstalasaun()
    {
        return $this->belongsTo(likidasaun_instalasaun::class, 'likidasauns_install_id');
    }
    

    // In StatusPagamentu model
public function scopeLunas($query)
{
    return $query->where('iha_devida', '<=', 0);
}

public function scopeSedaukLunas($query)
{
    return $query->where('iha_devida', '>', 0);
}

public function scopeSeluOituan($query)
{
    return $query->where('selu_ona', '>', 0)
                ->where('iha_devida', '>', 0);
}

public function scopeForClient($query, $klienteId)
{
    return $query->whereHas('klientePakote', function($q) use ($klienteId) {
        $q->where('kliente_id', $klienteId);
    });
}

}
