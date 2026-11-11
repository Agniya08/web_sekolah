<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'berita';

    protected $fillable = [
        'tanggal',
        'judul',
        'slug',
        'isi',
        'gambar',
        'status',
        'published_at',
    ];

    protected $casts = [
        'tanggal' => 'date',
    ];
}