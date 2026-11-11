<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendaftaran extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_lengkap',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
        'no_hp',
        'nama_orang_tua',
        'asal_sekolah',
        'program_keahlian',
        'status',
    ];

    // Daftar pilihan program keahlian / kelas khusus
    public static function daftarProgram(): array
    {
        return [
            'PPLG',
            'AKL',
            'MPLB',
            'TJKT',
            'TSM',
            'Tata Busana',
            'DKV',
            'Kelas Khusus Atlit',
            'Kelas Khusus Yamaha',
            'Kelas Khusus Tahfiz',
        ];
    }
}