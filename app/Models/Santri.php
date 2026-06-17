<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Santri extends Model
{
     protected $table = 'santri';

    protected $fillable = [
        'nis',
        'name',
        'kelas_id',
        'gender',
        'status',
    ];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
    public function absensi()
    {
        return $this->hasMany(Absensi::class);
    }
    // public function santri()
    // {
    //     return $this->belongsTo(Santri::class);
    // }
    public function pembayaran()
{
    return $this->hasMany(Pembayaran::class);
}

}
