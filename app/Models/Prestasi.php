<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_prestasi',
        'nim',
        'nama',
        'fakultas',
        'prodi',
        'tahun',
        'lomba',
        'jenis',
        'tingkat',
        'prestasi',
        'sertifikat',
        'dokumentasi',
        'foto',
    ];
}
