<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pedoman extends Model
{
    protected $table = 'pedomans';
    protected $fillable = [
        'judul',
        'pedoman',
        'cover'
    ];
}
