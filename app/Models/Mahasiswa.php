<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = [
        'nim',
        'nama',
        'password',
        'tempat_lahir',
        'kelamin',
        'tanggal_lahir',
        'fakultas',
        'prodi',
        'gelar',
        'no_hp',
        'status',
        'skpi',
        'ijazah',
        'alamat',
        'nik',
        'pisn',
        'periode_lulus',
        'tanggal_yudisium',
        'foto'
    ];

    /** 
     * The primary key associated with the table. 
     * 
     * @var string 
     */
    protected $primaryKey = 'nim';

    /** 
     * The "type" of the primary key. 
     * 
     * @var string 
     */
    protected $keyType = 'string';
}
