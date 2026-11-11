@extends('admin.layout')

@section('title', isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri')

@section('content')

<div class="mb-4">

    <h2 class="fw-bold">

        {{ isset($galeri) ? 'Edit Galeri' : 'Tambah Galeri' }}

    </h2>

    <p class="text-muted">
        Kelola foto kegiatan sekolah.
    </p>

</div>


<div class="card admin-card">

    <div class="card-body p-4">

        <form
            action="{{ isset($galeri)
                ?route('admin.galeri.update', ['galeri' => $galeri->id])
                : route('admin.galeri.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            @if(isset($galeri))
                @method('PUT')
            @endif


            <!-- JUDUL -->

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Judul Foto
                </label>

                <input
                    type="text"
                    name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul', $galeri->judul ?? '') }}"
                    placeholder="Contoh: Kegiatan Upacara Bendera"
                >

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            <!-- DESKRIPSI -->

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Deskripsi
                </label>

                <textarea
                    name="deskripsi"
                    rows="5"
                    class="form-control"
                    placeholder="Deskripsi foto">{{ old('deskripsi', $galeri->deskripsi ?? '') }}</textarea>

            </div>


            <!-- GAMBAR -->

            <div class="mb-3">

                <label class="form-label fw-bold">
                    Foto
                </label>

                <input
                    type="file"
                    name="gambar"
                    class="form-control @error('gambar') is-invalid @enderror"
                    accept="image/*"
                >

                <small class="text-muted">
                    JPG, JPEG, PNG atau WEBP. Maksimal 2 MB.
                </small>

                @error('gambar')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>


            @if(isset($galeri))

                <div class="mb-3">

                    <p class="fw-bold">
                        Foto Saat Ini
                    </p>

                    <img
                        src="{{ asset('storage/' . $galeri->gambar) }}"
                        style="width:220px;height:150px;object-fit:cover;border-radius:10px;"
                    >

                </div>

            @endif


            <!-- STATUS -->

            <div class="form-check form-switch mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="status"
                    id="status"
                    {{ old('status', $galeri->status ?? false) ? 'checked' : '' }}
                >

                <label
                    class="form-check-label"
                    for="status">

                    Publish foto

                </label>

            </div>


            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-danger">

                    {{ isset($galeri) ? 'Simpan Perubahan' : 'Simpan Foto' }}

                </button>

                <a
                    href="{{ route('admin.galeri.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>

</div>

@endsection