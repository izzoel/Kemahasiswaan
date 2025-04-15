<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'nim',
        'tahun',
        'prestasi',
        'jenis',
        'tingkat',
        'raihan',
        'sertifikat',
        'dokumentasi',
        'foto',
    ];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim');
    }
}
