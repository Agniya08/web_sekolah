@extends('admin.layout')

@section('title', 'Manajemen Berita')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>
        <h2 class="fw-bold mb-1">
            Manajemen Berita
        </h2>

        <p class="text-muted mb-0">
            Kelola berita dan informasi sekolah.
        </p>
    </div>

    <a href="{{ route('admin.berita.create') }}"
       class="btn btn-danger">

        + Tambah Berita

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

                        <th>Tanggal</th>

                        <th>Judul</th>

                        <th>Status</th>

                        <th width="230">Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($berita as $item)

                    <tr>

                        <td>
                            {{ $berita->firstItem() + $loop->index }}
                        </td>

                        <td>

                            @if($item->gambar)

                                <img
                                    src="{{ asset('storage/' . $item->gambar) }}"
                                    alt="{{ $item->judul }}"
                                >

                            @else

                                <span class="text-muted">
                                    Tidak ada
                                </span>

                            @endif

                        </td>

                        <td>
                            {{ $item->tanggal->format('d-m-Y') }}
                        </td>

                        <td>
                            <strong>
                                {{ $item->judul }}
                            </strong>
                        </td>

                        <td>

                            @if($item->status)

                                <span class="badge bg-success">
                                    Published
                                </span>

                            @else

                                <span class="badge bg-secondary">
                                    Unpublished
                                </span>

                            @endif

                        </td>

                        <td>

                            <a href="{{ route('admin.berita.edit', $item->id) }}"
                                class="btn btn-warning">
                                 Edit
                            </a>


                            <form
                                action="{{ route('admin.berita.toggle-status', $item) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-info btn-sm">

                                    {{ $item->status ? 'Unpublish' : 'Publish' }}

                                </button>

                            </form>


                            <form action="{{ route('admin.berita.destroy', $item->id) }}"
                                method="POST"
                                class="d-inline">

                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus berita ini?')">
                                    Hapus
                                </button>

                            </form>
                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td colspan="6"
                            class="text-center py-4">

                            Belum ada berita.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="mt-3">

            {{ $berita->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection