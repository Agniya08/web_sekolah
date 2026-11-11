@extends('admin.layout')

@section('title', 'Detail Pendaftar')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Detail Pendaftar
        </h2>

        <p class="text-muted mb-0">
            Informasi lengkap calon peserta didik baru.
        </p>
    </div>

    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-outline-secondary">
        &larr; Kembali
    </a>

</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card admin-card mb-3">

    <div class="card-body">

        <table class="table table-borderless mb-0">

            <tr>
                <th width="220">Nama Lengkap</th>
                <td>: {{ $pendaftaran->nama_lengkap }}</td>
            </tr>

            <tr>
                <th>NISN</th>
                <td>: {{ $pendaftaran->nisn ?? '-' }}</td>
            </tr>

            <tr>
                <th>Tempat, Tanggal Lahir</th>
                <td>: {{ $pendaftaran->tempat_lahir }}, {{ \Carbon\Carbon::parse($pendaftaran->tanggal_lahir)->format('d-m-Y') }}</td>
            </tr>

            <tr>
                <th>Jenis Kelamin</th>
                <td>: {{ $pendaftaran->jenis_kelamin }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>: {{ $pendaftaran->alamat }}</td>
            </tr>

            <tr>
                <th>No. HP / WhatsApp</th>
                <td>: {{ $pendaftaran->no_hp }}</td>
            </tr>

            <tr>
                <th>Nama Orang Tua / Wali</th>
                <td>: {{ $pendaftaran->nama_orang_tua }}</td>
            </tr>

            <tr>
                <th>Asal Sekolah</th>
                <td>: {{ $pendaftaran->asal_sekolah }}</td>
            </tr>

            <tr>
                <th>Program Keahlian</th>
                <td>: {{ $pendaftaran->program_keahlian }}</td>
            </tr>

            <tr>
                <th>Tanggal Daftar</th>
                <td>: {{ $pendaftaran->created_at->format('d-m-Y H:i') }}</td>
            </tr>

        </table>

    </div>

</div>


<div class="card admin-card">

    <div class="card-body">

        <h5 class="fw-bold mb-3">Ubah Status Pendaftaran</h5>

        <form action="{{ route('admin.pendaftaran.update-status', $pendaftaran->id) }}" method="POST" class="row g-2 align-items-center">

            @csrf
            @method('PUT')

            <div class="col-md-6">
                <select name="status" class="form-select">
                    @foreach(['Baru Masuk', 'Diverifikasi', 'Diterima', 'Ditolak'] as $status)
                        <option value="{{ $status }}" {{ $pendaftaran->status == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-3">
                <button type="submit" class="btn btn-danger w-100">
                    Simpan Status
                </button>
            </div>

        </form>

    </div>

</div>

@endsection