<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Beasiswa extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_beasiswa',
        'nim',
        'nama',
        'fakultas',
        'prodi',
        'jenis',
        'lomba',
        'tahun',
        'prestasi',
        'ips',
        'terbaik',
        'tingkat',
        'sertifikat',
        'dokumentasi',
        'foto',
        'surat',
    ];
}
