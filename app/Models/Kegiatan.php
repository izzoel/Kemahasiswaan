<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $fillable = [
        'id_organisasi',
        'kegiatan',
        'pelaksanaan',
        'anggaran',
        'proposal',
        'status'
    ];

    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }
}
