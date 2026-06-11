<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Santri;


class Kelas extends Model
{
   protected $table = 'kelas';

    protected $fillable = [
        'nama_kelas',
        'tingkat',
        'status'
    ];
        public function santris()
        {
            return $this->hasMany(Santri::class);
        }
        public function jadwals()
        {
            return $this->hasMany(Jadwal::class);
        }
}
