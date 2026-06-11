<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
      protected $table = 'guru';

    protected $fillable = [
        'nip',
        'name',
        'mapel_id',
        'phone',
        'status'
    ];
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }
    public function jadwals()
    {
        return $this->hasMany(Jadwal::class);
    }
}
