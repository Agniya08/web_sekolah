@extends('admin.layout')

@section('title', 'Profil Sekolah')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <h3 class="mb-0">Profil Sekolah</h3>
</div>

<div class="card admin-card">
    <div class="card-body p-4">

        <form action="{{ route('admin.profil.update') }}" method="POST">
            @csrf
            @method('PUT')

            <h5 class="mb-3">Tentang Sekolah</h5>

            <div class="mb-3">
                <label class="form-label">Deskripsi Sekolah</label>
                <textarea name="tentang" rows="7" class="form-control">{{ old('tentang', $profil->tentang) }}</textarea>
                <small class="text-muted">Tekan Enter dua kali untuk membuat paragraf baru.</small>
            </div>

            <hr class="my-4">

            <h5 class="mb-3">Informasi Profil Sekolah</h5>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Nama Sekolah <span class="text-danger">*</span></label>
                    <input type="text" name="nama_sekolah" class="form-control"
                           value="{{ old('nama_sekolah', $profil->nama_sekolah) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">NPSN</label>
                    <input type="text" name="npsn" class="form-control"
                           value="{{ old('npsn', $profil->npsn) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Status Sekolah</label>
                    <input type="text" name="status_sekolah" class="form-control"
                           value="{{ old('status_sekolah', $profil->status_sekolah) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Jenjang Pendidikan</label>
                    <input type="text" name="jenjang" class="form-control"
                           value="{{ old('jenjang', $profil->jenjang) }}">
                </div>

                <div class="col-md-4 mb-3">
                    <label class="form-label">Akreditasi</label>
                    <input type="text" name="akreditasi" class="form-control"
                           value="{{ old('akreditasi', $profil->akreditasi) }}">
                </div>

                <div class="col-12 mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" rows="2" class="form-control">{{ old('alamat', $profil->alamat) }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Kepala Sekolah</label>
                    <input type="text" name="kepala_sekolah" class="form-control"
                           value="{{ old('kepala_sekolah', $profil->kepala_sekolah) }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Guru <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="jumlah_guru" class="form-control"
                           value="{{ old('jumlah_guru', $profil->jumlah_guru) }}">
                </div>

                <div class="col-md-3 mb-3">
                    <label class="form-label">Jumlah Siswa <span class="text-danger">*</span></label>
                    <input type="number" min="0" name="jumlah_siswa" class="form-control"
                           value="{{ old('jumlah_siswa', $profil->jumlah_siswa) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Email</label>
                    <input type="text" name="email" class="form-control"
                           value="{{ old('email', $profil->email) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Telepon</label>
                    <input type="text" name="telepon" class="form-control"
                           value="{{ old('telepon', $profil->telepon) }}">
                </div>

            </div>

            <hr class="my-4">

            <h5 class="mb-3">Visi dan Misi</h5>

            <div class="row">

                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Visi</label>
                    <input type="text" name="visi_judul" class="form-control"
                           value="{{ old('visi_judul', $profil->visi_judul) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Judul Misi</label>
                    <input type="text" name="misi_judul" class="form-control"
                           value="{{ old('misi_judul', $profil->misi_judul) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Isi Visi</label>
                    <textarea name="visi" rows="4" class="form-control">{{ old('visi', $profil->visi) }}</textarea>
                </div>

                <div class="col-md-6 mb-3">
                    <label class="form-label">Isi Misi</label>
                    <textarea name="misi" rows="4" class="form-control">{{ old('misi', $profil->misi) }}</textarea>
                </div>

            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger">Simpan Profil</button>
            </div>

        </form>

    </div>
</div>

@endsection