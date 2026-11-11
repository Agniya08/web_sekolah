<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function edit()
    {
        // Kalau data profil belum ada, otomatis dibuat dari isi halaman profil yang sekarang
        $profil = Profil::firstOrCreate([], [
            'nama_sekolah'   => 'SMKS Al-Falah Tanjungjaya',
            'npsn'           => '20201234',
            'status_sekolah' => 'Swasta',
            'jenjang'        => 'SMK',
            'alamat'         => 'Jl. KH. Ahmad Faqih KP. Kebonkalapa, Desa Cibalanarik, Kec. Tanjungjaya, Kab. Tasikmalaya, Jawa Barat 46184',
            'akreditasi'     => 'A',
            'kepala_sekolah' => 'Asep Iman Ruyani S.Ag',
            'jumlah_guru'    => 63,
            'jumlah_siswa'   => 1250,
            'email'          => 'alfalahtanjungjayasmk@gmail.com',
            'telepon'        => '0812-3456-7890',
            'tentang'        => "SMK Al Falah Tanjungjaya merupakan sekolah yang memadukan keunggulan pendidikan pesantren serta pengembangan keterampilan berbagai keahlian sebagai kontribusi dalam mensejahterakan masyarakat. Kami menyelenggarakan pendidikan berkualitas dengan penekanan pada pengembangan karakter, kompetensi dan social skill siswa untuk menghadapi dunia industri yang kompetitif.\n\nSekolah mengembangkan kemampuan akademik, keterampilan, kreativitas, karakter, serta kemampuan siswa agar siap melanjutkan pendidikan maupun memasuki dunia kerja.",
            'visi_judul'     => 'Menjadi Sekolah Unggul',
            'visi'           => 'Menjadi sekolah kejuruan yang unggul dalam prestasi, teknologi, keterampilan, dan karakter.',
            'misi_judul'     => 'Membangun Generasi Berkualitas',
            'misi'           => 'Menyelenggarakan pendidikan yang berkualitas, inovatif, dan berkarakter.',
        ]);

        return view('admin.profil.edit', compact('profil'));
    }

    public function update(Request $request)
    {
        $data = $request->validate([
            'nama_sekolah'   => 'required|string|max:255',
            'npsn'           => 'nullable|string|max:50',
            'status_sekolah' => 'nullable|string|max:100',
            'jenjang'        => 'nullable|string|max:100',
            'alamat'         => 'nullable|string',
            'akreditasi'     => 'nullable|string|max:50',
            'kepala_sekolah' => 'nullable|string|max:255',
            'jumlah_guru'    => 'required|integer|min:0',
            'jumlah_siswa'   => 'required|integer|min:0',
            'email'          => 'nullable|email|max:255',
            'telepon'        => 'nullable|string|max:50',
            'tentang'        => 'nullable|string',
            'visi_judul'     => 'nullable|string|max:255',
            'visi'           => 'nullable|string',
            'misi_judul'     => 'nullable|string|max:255',
            'misi'           => 'nullable|string',
        ], [
            'nama_sekolah.required' => 'Nama sekolah wajib diisi.',
            'jumlah_guru.required'  => 'Jumlah guru wajib diisi.',
            'jumlah_guru.integer'   => 'Jumlah guru harus berupa angka.',
            'jumlah_siswa.required' => 'Jumlah siswa wajib diisi.',
            'jumlah_siswa.integer'  => 'Jumlah siswa harus berupa angka.',
            'email.email'           => 'Format email tidak valid.',
        ]);

        $profil = Profil::first() ?? new Profil();
        $profil->fill($data)->save();

        return redirect()
            ->route('admin.profil.edit')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }
}