<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKegiatan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_kegiatan',
        'status',
        'keterangan',
    ];
}
