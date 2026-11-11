<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PpdbController extends Controller
{
    // Menampilkan halaman formulir pendaftaran
    public function create()
    {
        $daftarProgram = Pendaftaran::daftarProgram();

        return view('ppdb.formulir', compact('daftarProgram'));
    }

    // Menyimpan data formulir yang diisi calon siswa
    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:20',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
            'nama_orang_tua' => 'required|string|max:255',
            'asal_sekolah' => 'required|string|max:255',
            'program_keahlian' => 'required|in:' . implode(',', Pendaftaran::daftarProgram()),
        ], [
            'nama_lengkap.required' => 'Nama lengkap wajib diisi.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'alamat.required' => 'Alamat wajib diisi.',
            'no_hp.required' => 'Nomor HP/WhatsApp wajib diisi.',
            'nama_orang_tua.required' => 'Nama orang tua/wali wajib diisi.',
            'asal_sekolah.required' => 'Asal sekolah wajib diisi.',
            'program_keahlian.required' => 'Program keahlian wajib dipilih.',
            'program_keahlian.in' => 'Program keahlian tidak valid.',
        ]);

        Pendaftaran::create([
            'nama_lengkap' => $request->nama_lengkap,
            'nisn' => $request->nisn,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'nama_orang_tua' => $request->nama_orang_tua,
            'asal_sekolah' => $request->asal_sekolah,
            'program_keahlian' => $request->program_keahlian,
        ]);

        return redirect()
            ->route('ppdb.sukses')
            ->with('success', 'Pendaftaran berhasil dikirim. Silakan tunggu informasi selanjutnya dari pihak sekolah.');
    }

    // Halaman ucapan terima kasih setelah berhasil daftar
    public function sukses()
    {
        return view('ppdb.sukses');
    }
}