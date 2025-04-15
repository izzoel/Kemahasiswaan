<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = [
        'id_organisasi',
        'program',
        'pelaksanaan',
        'anggaran',
        'keterangan'
    ];
    public function organisasi()
    {
        return $this->belongsTo(Organisasi::class, 'id_organisasi');
    }
}
