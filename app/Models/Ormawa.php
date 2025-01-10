<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ormawa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'logo',
        'keterangan',
        'anggaran',
        'kode_ormawa',
        'id_periode',
    ];

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
