<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'nama_sekolah',
        'npsn',
        'status_sekolah',
        'jenjang',
        'alamat',
        'akreditasi',
        'kepala_sekolah',
        'jumlah_guru',
        'jumlah_siswa',
        'email',
        'telepon',
        'tentang',
        'visi_judul',
        'visi',
        'misi_judul',
        'misi',
    ];
}