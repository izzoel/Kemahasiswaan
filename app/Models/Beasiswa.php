<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    protected $fillable = [
        'nim',
        'id_prestasi',
        'beasiswa',
        'surat',
        'status'
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }

    public function prestasi()
    {
        return $this->belongsTo(Prestasi::class, 'id_prestasi');
    }
}
