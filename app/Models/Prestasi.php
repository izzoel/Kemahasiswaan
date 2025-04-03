<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    protected $fillable = [
        'nama',
        'lomba',
        'tahun',
        'prestasi',
        'sertifikat',
        'dokumentasi',
        'foto',
    ];
}
