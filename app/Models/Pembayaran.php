<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
     protected $table = 'pembayaran';

    protected $fillable = [
        'santri_id',
        'jenis_pembayaran_id',
        'tanggal_bayar',
        'jumlah_bayar',
        'metode_bayar',
        'keterangan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }

    public function jenisPembayaran()
    {
        return $this->belongsTo(JenisPembayaran::class);
    }
}
