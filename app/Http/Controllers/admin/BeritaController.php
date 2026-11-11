<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BeritaController extends Controller
{
        public function show($id)
    {
        $berita = Berita::findOrFail($id);
        return view('berita.show', compact('berita'));
    }

    public function index()
    {
        $berita = Berita::latest('tanggal')->paginate(10);

        return view('admin.berita.index', compact('berita'));
    }

    public function create()
    {
        return view('admin.berita.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'tanggal.required' => 'Tanggal wajib diisi.',
            'judul.required' => 'Judul wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus JPG, JPEG, PNG atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Membuat slug dari judul
        $slug = Str::slug($request->judul);

        // Memastikan slug tidak sama dengan berita lain
        $slugAsli = $slug;
        $nomor = 1;

        while (Berita::where('slug', $slug)->exists()) {
            $slug = $slugAsli . '-' . $nomor;
            $nomor++;
        }

        $data = [
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'status' => $request->has('status') ? 'published' : 'draft',
        ];

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        Berita::create($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil ditambahkan.');
    }

    public function edit(Berita $berita)
    {
        return view('admin.berita.edit', compact('berita'));  
    }

    public function update(Request $request, Berita $berita)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'isi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ], [
            'tanggal.required' => 'Tanggal wajib diisi.',
            'judul.required' => 'Judul wajib diisi.',
            'isi.required' => 'Isi berita wajib diisi.',
            'gambar.image' => 'File harus berupa gambar.',
            'gambar.mimes' => 'Gambar harus JPG, JPEG, PNG atau WEBP.',
            'gambar.max' => 'Ukuran gambar maksimal 2 MB.',
        ]);

        // Membuat slug dari judul
        $slug = Str::slug($request->judul);

        // Memastikan slug tidak sama dengan berita lain
        $slugAsli = $slug;
        $nomor = 1;

        while (
            Berita::where('slug', $slug)
                ->where('id', '!=', $berita->id)
                ->exists()
        ) {
            $slug = $slugAsli . '-' . $nomor;
            $nomor++;
        }

        $data = [
            'tanggal' => $request->tanggal,
            'judul' => $request->judul,
            'slug' => $slug,
            'isi' => $request->isi,
            'status' => $request->has('status') ? 'published' : 'draft',
        ];

        // Kalau upload gambar baru
        if ($request->hasFile('gambar')) {

            // Hapus gambar lama
            if ($berita->gambar) {
                Storage::disk('public')->delete($berita->gambar);
            }

            // Simpan gambar baru
            $data['gambar'] = $request->file('gambar')
                ->store('berita', 'public');
        }

        $berita->update($data);

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil diperbarui.');
    }

    public function destroy(Berita $berita)
    {
        // Hapus gambar dari storage
        if ($berita->gambar) {
            Storage::disk('public')->delete($berita->gambar);
        }

        // Hapus data berita
        $berita->delete();

        return redirect()
            ->route('admin.berita.index')
            ->with('success', 'Berita berhasil dihapus.');
    }

    public function toggleStatus(Berita $berita)
    {
        if ($berita->status === 'published') {
            $berita->status = 'draft';
        } else {
            $berita->status = 'published';
        }

        $berita->save();

        return back()->with(
            'success',
            $berita->status === 'published'
                ? 'Berita berhasil dipublish.'
                : 'Berita berhasil di-unpublish.'
        );
    }
}