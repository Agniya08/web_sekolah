@extends('admin.layout')

@section('title', isset($ekstrakurikuler) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">
        {{ isset($ekstrakurikuler) ? 'Edit Ekstrakurikuler' : 'Tambah Ekstrakurikuler' }}
    </h2>
    <p class="text-muted">
        Kelola data kegiatan ekstrakurikuler sekolah.
    </p>
</div>

<div class="card admin-card">
    <div class="card-body p-4">

        <form
            action="{{ isset($ekstrakurikuler)
                ? route('admin.ekstrakurikuler.update', $ekstrakurikuler->id)
                : route('admin.ekstrakurikuler.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf
            @if(isset($ekstrakurikuler))
                @method('PUT')
            @endif

            <div class="mb-3">
                <label class="form-label fw-bold">Nama</label>
                <input
                    type="text"
                    name="nama"
                    class="form-control @error('nama') is-invalid @enderror"
                    value="{{ old('nama', $ekstrakurikuler->nama ?? '') }}"
                    placeholder="Contoh: Pramuka">
                @error('nama')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Kategori</label>
                <input
                    type="text"
                    name="kategori"
                    class="form-control @error('kategori') is-invalid @enderror"
                    value="{{ old('kategori', $ekstrakurikuler->kategori ?? '') }}"
                    placeholder="Contoh: Wajib / Olahraga / Seni">
                @error('kategori')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Deskripsi</label>
                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control"
                    placeholder="Deskripsi kegiatan">{{ old('deskripsi', $ekstrakurikuler->deskripsi ?? '') }}</textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Gambar</label>
                <input
                    type="file"
                    name="gambar"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*">
                <small class="text-muted">JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.</small>
                @error('gambar')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            @if(isset($ekstrakurikuler) && $ekstrakurikuler->gambar)
                <div class="mb-3">
                    <p class="fw-bold">Gambar Saat Ini</p>
                    <img
                        src="{{ asset('storage/' . $ekstrakurikuler->gambar) }}"
                        style="width:220px;height:150px;object-fit:cover;border-radius:10px;">
                </div>
            @endif

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-danger">
                    {{ isset($ekstrakurikuler) ? 'Simpan Perubahan' : 'Simpan' }}
                </button>
                <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-secondary">
                    Kembali
                </a>
            </div>

        </form>

    </div>
</div>

@endsection