@extends('admin.layout')

@section('title', 'Manajemen Galeri')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">

    <div>

        <h2 class="fw-bold mb-1">
            Manajemen Galeri
        </h2>

        <p class="text-muted mb-0">
            Kelola foto kegiatan sekolah.
        </p>

    </div>

    <a
        href="{{ route('admin.galeri.create') }}"
        class="btn btn-danger">

        + Tambah Foto

    </a>

</div>


<div class="card admin-card">

    <div class="card-body">

        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>

                    <tr>

                        <th>No</th>
                        <th>Foto</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Status</th>
                        <th>Aksi</th>

                    </tr>

                </thead>

                <tbody>

                    @forelse($galeri as $item)

                    <tr>

                        <td>
                            {{ $galeri->firstItem() + $loop->index }}
                        </td>

                        <td>

                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->judul }}"
                            >

                        </td>

                        <td>
                            <strong>
                                {{ $item->judul }}
                            </strong>
                        </td>

                        <td>
                            {{ Str::limit($item->deskripsi, 50) }}
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

                            <a
                                href="{{ route('admin.galeri.edit', $item) }}"
                                class="btn btn-warning btn-sm">

                                Edit

                            </a>


                            <form
                                action="{{ route('admin.galeri.toggle-status', $item) }}"
                                method="POST"
                                class="d-inline">

                                @csrf

                                <button
                                    type="submit"
                                    class="btn btn-info btn-sm">

                                    {{ $item->status ? 'Unpublish' : 'Publish' }}

                                </button>

                            </form>


                            <form
                                action="{{ route('admin.galeri.destroy', $item) }}"
                                method="POST"
                                class="d-inline"
                                onsubmit="return confirm('Yakin ingin menghapus foto ini?')">

                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn btn-danger btn-sm">

                                    Hapus

                                </button>

                            </form>

                        </td>

                    </tr>

                    @empty

                    <tr>

                        <td
                            colspan="6"
                            class="text-center py-4">

                            Belum ada foto galeri.

                        </td>

                    </tr>

                    @endforelse

                </tbody>

            </table>

        </div>


        <div class="mt-3">

            {{ $galeri->links('pagination::bootstrap-5') }}

        </div>

    </div>

</div>

@endsection