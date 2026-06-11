<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';

    protected $fillable = [
        'santri_id',
        'tanggal',
        'status',
        'keterangan'
    ];

    public function santri()
    {
        return $this->belongsTo(Santri::class);
    }
}
