@extends('admin.layout')

@section('title', 'Data Pendaftar PPDB')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Data Pendaftar PPDB
        </h2>

        <p class="text-muted mb-0">
            Daftar calon peserta didik baru yang sudah mendaftar.
        </p>
    </div>

</div>


<div class="card admin-card mb-3">

    <div class="card-body">

        <form action="{{ route('admin.pendaftaran.index') }}" method="GET" class="row g-2">

            <div class="col-md-4">
                <select name="status" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Semua Status --</option>
                    @foreach(['Baru Masuk', 'Diverifikasi', 'Diterima', 'Ditolak'] as $status)
                        <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                            {{ $status }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-4">
                <select name="program_keahlian" class="form-select" onchange="this.form.submit()">
                    <option value="">-- Semua Program --</option>
                    @foreach($daftarProgram as $program)
                        <option value="{{ $program }}" {{ request('program_keahlian') == $program ? 'selected' : '' }}>
                            {{ $program }}
                        </option>
                    @endforeach
                </select>
            </div>

            @if(request('status') || request('program_keahlian'))
                <div class="col-md-2">
                    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-outline-secondary w-100">
                        Reset Filter
                    </a>
                </div>
            @endif

        </form>

    </div>

</div>


<div class="card admin-card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>

                        <th>Nama Lengkap</th>

                        <th>Asal Sekolah</th>

                        <th>Program</th>

                        <th>No. HP</th>

                        <th>Status</th>

                        <th width="220">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($pendaftaran as $item)

                    <tr>

                        <td>
                            {{ $pendaftaran->firstItem() + $loop->index }}
                        </td>

                        <td>
                            <strong>{{ $item->nama_lengkap }}</strong><br>
                            <small class="text-muted">{{ $item->nisn ?? '-' }}</small>
                        </td>

                        <td>
                            {{ $item->asal_sekolah }}
                        </td>

                        <td>
                            {{ $item->program_keahlian }}
                        </td>

                        <td>
                            {{ $item->no_hp }}
                        </td>

                        <td>

                            @php
                                $badgeColor = match($item->status) {
                                    'Diterima' => 'bg-success',
                                    'Ditolak' => 'bg-danger',
                                    'Diverifikasi' => 'bg-info',
                                    default => 'bg-secondary',
                                };
                            @endphp

                            <span class="badge {{ $badgeColor }}">
                                {{ $item->status }}
                            </span>

                        </td>

                        <td>

                            <a href="{{ route('admin.pendaftaran.show', $item->id) }}"
                                class="btn btn-warning btn-sm">
                                Detail
                            </a>

                            <form action="{{ route('admin.pendaftaran.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger btn-sm"
                                        onclick="return confirm('Yakin ingin menghapus data pendaftar ini?')">
                                    Hapus
                                </button>

                            </form>
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="7"
                            class="text-center py-4">

                            Belum ada pendaftar.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="mt-3">

            {{ $pendaftaran->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection