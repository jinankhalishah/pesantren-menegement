<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'mapel';

    protected $fillable = [
        'kode',
        'nama_mapel',
        'status',
    ];
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}


