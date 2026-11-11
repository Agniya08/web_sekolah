@extends('admin.layout')

@section('title', isset($jurusan) ? 'Edit Data' : 'Tambah Data')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="mb-1">{{ isset($jurusan) ? 'Edit Data' : 'Tambah Data' }}</h3>
        <p class="text-muted mb-0">Jurusan atau kelas khusus yang tampil di beranda</p>
    </div>

    <div class="card admin-card">
        <div class="card-body p-4">

            <form
                action="{{ isset($jurusan) ? route('admin.jurusan.update', $jurusan) : route('admin.jurusan.store') }}"
                method="POST"
                enctype="multipart/form-data">

                @csrf
                @if(isset($jurusan))
                    @method('PUT')
                @endif

                <div class="mb-3">
                    <label class="form-label">Tipe <span class="text-danger">*</span></label>
                    <select name="tipe" class="form-select">
                        <option value="jurusan"
                            {{ old('tipe', $jurusan->tipe ?? 'jurusan') === 'jurusan' ? 'selected' : '' }}>
                            Jurusan
                        </option>
                        <option value="kelas_khusus"
                            {{ old('tipe', $jurusan->tipe ?? 'jurusan') === 'kelas_khusus' ? 'selected' : '' }}>
                            Kelas Khusus
                        </option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Nama <span class="text-danger">*</span></label>
                    <input type="text" name="nama" class="form-control"
                           value="{{ old('nama', $jurusan->nama ?? '') }}">
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi <span class="text-danger">*</span></label>
                    <textarea name="deskripsi" rows="5" class="form-control">{{ old('deskripsi', $jurusan->deskripsi ?? '') }}</textarea>
                </div>

                <div class="mb-3">
                    <label class="form-label">Gambar</label>

                    @if(isset($jurusan) && $jurusan->gambar)
                        <div class="mb-2">
                            <img src="{{ asset('storage/' . $jurusan->gambar) }}"
                                 alt="{{ $jurusan->nama }}"
                                 style="max-width: 200px; border-radius: 8px;">
                        </div>
                        <small class="text-muted d-block mb-2">
                            Kosongkan kalau tidak ingin mengganti gambar.
                        </small>
                    @endif

                    <input type="file" name="gambar" class="form-control" accept="image/*">
                    <small class="text-muted">JPG, JPEG, PNG atau WEBP, maksimal 2 MB.</small>
                </div>

                <div class="mt-4 d-flex gap-2">
                    <button type="submit" class="btn btn-danger">Simpan</button>
                    <a href="{{ route('admin.jurusan.index') }}" class="btn btn-secondary">Kembali</a>
                </div>

            </form>

        </div>
    </div>

</div>

@endsection