<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ekstrakurikuler extends Model
{
    protected $table = 'ekstrakurikulers';

    protected $fillable = [
        'nama',
        'kategori',
        'deskripsi',
        'gambar',
    ];
}