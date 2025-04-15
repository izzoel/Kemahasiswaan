<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Dana extends Model
{
    protected $fillable = [
        'id_organisasi',
        'id_kegiatan',
        'dana',
        'berkas',
        'status'
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }
    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'id_kegiatan');
    }
}
