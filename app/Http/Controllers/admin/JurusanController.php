<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::orderBy('tipe')->orderBy('id')->get();

        return view('admin.jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('admin.jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'tipe'      => 'required|in:jurusan,kelas_khusus',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'tipe.required'      => 'Tipe wajib dipilih.',
            'tipe.in'            => 'Tipe tidak valid.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'gambar.image'       => 'File harus berupa gambar.',
            'gambar.mimes'       => 'Gambar harus JPG, JPEG, PNG atau WEBP.',
            'gambar.max'         => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = $request->only(['nama', 'tipe', 'deskripsi']);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        Jurusan::create($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit(Jurusan $jurusan)
    {
        return view('admin.jurusan.create', compact('jurusan'));
    }

    public function update(Request $request, Jurusan $jurusan)
    {
        $request->validate([
            'nama'      => 'required|string|max:255',
            'tipe'      => 'required|in:jurusan,kelas_khusus',
            'deskripsi' => 'required|string',
            'gambar'    => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'nama.required'      => 'Nama wajib diisi.',
            'tipe.required'      => 'Tipe wajib dipilih.',
            'tipe.in'            => 'Tipe tidak valid.',
            'deskripsi.required' => 'Deskripsi wajib diisi.',
            'gambar.image'       => 'File harus berupa gambar.',
            'gambar.mimes'       => 'Gambar harus JPG, JPEG, PNG atau WEBP.',
            'gambar.max'         => 'Ukuran gambar maksimal 2 MB.',
        ]);

        $data = $request->only(['nama', 'tipe', 'deskripsi']);

        if ($request->hasFile('gambar')) {

            if ($jurusan->gambar) {
                Storage::disk('public')->delete($jurusan->gambar);
            }

            $data['gambar'] = $request->file('gambar')->store('jurusan', 'public');
        }

        $jurusan->update($data);

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy(Jurusan $jurusan)
    {
        if ($jurusan->gambar) {
            Storage::disk('public')->delete($jurusan->gambar);
        }

        $jurusan->delete();

        return redirect()
            ->route('admin.jurusan.index')
            ->with('success', 'Data berhasil dihapus.');
    }
}