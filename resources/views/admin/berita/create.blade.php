@extends('admin.layout')

@section('title', 'Tambah Berita')

@section('content')

<div class="mb-4">
    <h2 class="fw-bold">Tambah Berita</h2>

    <p class="text-muted">
        Isi informasi berita sekolah.
    </p>
</div>

<div class="card admin-card">
    <div class="card-body p-4">

        <form
            action="{{ route('admin.berita.store') }}"
            method="POST"
            enctype="multipart/form-data">

            @csrf

            <!-- TANGGAL -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    Tanggal
                </label>

                <input
                    type="date"
                    name="tanggal"
                    class="form-control @error('tanggal') is-invalid @enderror"
                    value="{{ old('tanggal') }}"
                >

                @error('tanggal')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- JUDUL -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    Judul Berita
                </label>

                <input
                    type="text"
                    name="judul"
                    class="form-control @error('judul') is-invalid @enderror"
                    value="{{ old('judul') }}"
                    placeholder="Masukkan judul berita"
                >

                @error('judul')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- ISI -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    Isi Berita
                </label>

                <textarea
                    name="isi"
                    rows="6"
                    class="form-control @error('isi') is-invalid @enderror"
                    placeholder="Masukkan isi berita">{{ old('isi') }}</textarea>

                @error('isi')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- GAMBAR -->
            <div class="mb-3">
                <label class="form-label fw-bold">
                    Gambar
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

            <!-- STATUS -->
            <div class="form-check form-switch mb-4">

                <input
                    class="form-check-input"
                    type="checkbox"
                    name="status"
                    id="status"
                    {{ old('status') ? 'checked' : '' }}
                >

                <label
                    class="form-check-label"
                    for="status">

                    Publish berita

                </label>

            </div>

            <!-- BUTTON -->
            <div class="d-flex gap-2">

                <button
                    type="submit"
                    class="btn btn-danger">

                    Simpan Berita

                </button>

                <a
                    href="{{ route('admin.berita.index') }}"
                    class="btn btn-secondary">

                    Kembali

                </a>

            </div>

        </form>

    </div>
</div>

@endsection