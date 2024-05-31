<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_ormawa',
        'tanggal_kegiatan',
        'id_kegiatan',
        'dana',
        'berkas',
        'status',
        'id_status',
    ];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }
    public function stat()
    {
        return $this->belongsTo(TransaksiKegiatan::class, 'id_status');
    }
}
