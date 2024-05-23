<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ormawa',
        'tanggal',
        'nama',
        'anggaran',
        'berkas',
        'status',
        'id_status'
    ];

    public function ormawa()
    {
        return $this->belongsTo(Ormawa::class, 'id_ormawa');
    }
    public function stat()
    {
        return $this->belongsTo(TransaksiKegiatan::class, 'id_status');
    }
}
