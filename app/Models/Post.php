<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'judul',
        'konten',
        'excerpt',
<<<<<<< HEAD
        'kategori',
        'thumbnail'
    ];
=======
        'id_kategori',
        'thumbnail'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori');
    }
>>>>>>> 740fe1f (add fitur tambah kategori)
}
