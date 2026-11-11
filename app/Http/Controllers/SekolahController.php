<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use App\Models\Berita;
use App\Models\Galeri;
use App\Models\Profil;
use App\Models\Ekstrakurikuler;
use App\Models\Jurusan;

class SekolahController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | BERANDA
    |--------------------------------------------------------------------------
    */

    public function beranda(): View
    {
        $profil = Profil::first();

        $data = [
            'guru' => $profil->jumlah_guru ?? 63,
            'siswa' => $profil->jumlah_siswa ?? 1250,
            'prestasi' => 250,
            'ekstrakurikuler' => Ekstrakurikuler::count(),
            'jurusan' => Jurusan::where('tipe', 'jurusan')->orderBy('id')->get(),
            'kelasKhusus' => Jurusan::where('tipe', 'kelas_khusus')->orderBy('id')->get(),
        ];

        return view('beranda', $data);
    }


    /*
    |--------------------------------------------------------------------------
    | PROFIL SEKOLAH
    |--------------------------------------------------------------------------
    */
    public function profil(): View
    {
        $profil = Profil::first() ?? new Profil();

        return view('profil', compact('profil'));
    }


    /*
    |--------------------------------------------------------------------------
    | EKSTRAKURIKULER
    |--------------------------------------------------------------------------
    */
    public function ekstrakurikuler(): View
    {
        $ekskul = Ekstrakurikuler::orderBy('id')->get();

        return view('ekstrakurikuler', compact('ekskul'));
    }

    /*
    |--------------------------------------------------------------------------
    | GALERI
    |--------------------------------------------------------------------------
    */

    public function galeri(): View
    {
        /*
        | Mengambil galeri yang sudah dipublish dari database.
        | Data galeri tidak lagi menggunakan array manual.
        */

        $galeri = Galeri::where('status', true)
            ->latest()
            ->get();

        return view('galeri', compact('galeri'));
    }


    /*
    |--------------------------------------------------------------------------
    | BERITA
    |--------------------------------------------------------------------------
    */

    public function berita(): View
    {
        /*
        | Hanya berita dengan status publish = true
        | yang ditampilkan di website.
        */

        $berita = Berita::where('status', 'published')  
            ->latest('tanggal')
            ->get();

        return view('berita', compact('berita'));
    }
        public function beritaShow($id): View
        {
            $berita = Berita::where('status', 'published')->findOrFail($id);

            return view('berita-detail', compact('berita'));
        }
}