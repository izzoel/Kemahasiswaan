<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiStatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'pengajuan',
        'id_transaksi',
        'status',
        'keterangan',
    ];
}
