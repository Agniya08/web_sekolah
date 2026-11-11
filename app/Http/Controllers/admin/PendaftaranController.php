<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    // Menampilkan daftar semua pendaftar (khusus admin, sudah dilindungi middleware auth)
    public function index(Request $request)
    {
        $query = Pendaftaran::latest();

        // Filter berdasarkan status (opsional)
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // Filter berdasarkan program keahlian (opsional)
        if ($request->filled('program_keahlian')) {
            $query->where('program_keahlian', $request->program_keahlian);
        }

        $pendaftaran = $query->paginate(15)->withQueryString();
        $daftarProgram = Pendaftaran::daftarProgram();

        return view('admin.pendaftaran.index', compact('pendaftaran', 'daftarProgram'));
    }

    // Melihat detail satu pendaftar
    public function show(Pendaftaran $pendaftaran)
    {
        return view('admin.pendaftaran.show', compact('pendaftaran'));
    }

    // Mengubah status pendaftaran (Baru Masuk / Diverifikasi / Diterima / Ditolak)
    public function updateStatus(Request $request, Pendaftaran $pendaftaran)
    {
        $request->validate([
            'status' => 'required|in:Baru Masuk,Diverifikasi,Diterima,Ditolak',
        ], [
            'status.required' => 'Status wajib dipilih.',
            'status.in' => 'Status tidak valid.',
        ]);

        $pendaftaran->status = $request->status;
        $pendaftaran->save();

        return back()->with('success', 'Status pendaftar berhasil diperbarui.');
    }

    // Menghapus data pendaftar
    public function destroy(Pendaftaran $pendaftaran)
    {
        $pendaftaran->delete();

        return redirect()
            ->route('admin.pendaftaran.index')
            ->with('success', 'Data pendaftar berhasil dihapus.');
    }
}