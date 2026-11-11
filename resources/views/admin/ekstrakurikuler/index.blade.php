@extends('admin.layout')

@section('title', 'Kelola Ekstrakurikuler')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <div>
            <h3 class="mb-1">Kelola Ekstrakurikuler</h3>

            <p class="text-muted mb-0">
                Data kegiatan ekstrakurikuler sekolah
            </p>
        </div>

        <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-danger">
            + Tambah Ekstrakurikuler
        </a>

    </div>


    <div class="card admin-card">

        <div class="card-body">

            <div class="table-responsive">

                <table class="table table-hover align-middle">

                    <thead>

                        <tr>
                            <th>No</th>
                            <th>Gambar</th>
                            <th>Nama</th>
                            <th>Kategori</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>

                    </thead>

                    <tbody>

                        @forelse($ekstrakurikuler as $item)

                            <tr>

                                <td>
                                    {{ $loop->iteration }}
                                </td>

                                <td>

                                    @if($item->gambar)

                                        <img
                                            src="{{ asset('storage/' . $item->gambar) }}"
                                            alt="{{ $item->nama }}"
                                            width="80"
                                            height="60"
                                            style="object-fit: cover; border-radius: 8px;">

                                    @else

                                        <span class="text-muted">
                                            Tidak ada gambar
                                        </span>

                                    @endif

                                </td>

                                <td>
                                    <strong>
                                        {{ $item->nama }}
                                    </strong>
                                </td>

                                <td>
                                    {{ $item->kategori }}
                                </td>

                                <td>
                                    {{ $item->deskripsi }}
                                </td>

                                <td>
                                    <a href="{{ route('admin.ekstrakurikuler.edit', $item) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>

                                    <form action="{{ route('admin.ekstrakurikuler.destroy', $item) }}"
                                        method="POST"
                                        class="d-inline"
                                        onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Hapus
                                        </button>
                                    </form>

                                </td>

                            </tr>

                        @empty

                            <tr>

                                <td
                                    colspan="6"
                                    class="text-center py-4 text-muted">

                                    Belum ada data ekstrakurikuler.

                                </td>

                            </tr>

                        @endforelse

                    </tbody>

                </table>

            </div>

        </div>

    </div>

</div>

@endsection