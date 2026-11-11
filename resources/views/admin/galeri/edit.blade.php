@extends('admin.layout')

@section('title', 'Edit Galeri')

@section('page-title', 'Edit Galeri')

@section('content')

<div class="table-card">

    <h4 class="mb-4">
        Edit Galeri
    </h4>


    <form
        action="{{ route('admin.galeri.update', $galeri) }}"
        method="POST"
        enctype="multipart/form-data">

        @csrf
        @method('PUT')


        <div class="mb-3">

            <label class="form-label d-block">
                Foto Saat Ini
            </label>

            <img
                src="{{ asset('storage/' . $galeri->gambar) }}"
                style="width:220px;height:150px;object-fit:cover;border-radius:10px;"
                class="mb-3">

            <input
                type="file"
                name="gambar"
                class="form-control"
                accept="image/*">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengganti foto.
            </small>

        </div>


        <div class="mb-3">

            <label class="form-label">
                Judul
            </label>

            <input
                type="text"
                name="judul"
                class="form-control"
                value="{{ old('judul', $galeri->judul) }}">

        </div>


        <div class="mb-3">

            <label class="form-label">
                Deskripsi
            </label>

            <textarea
                name="deskripsi"
                rows="5"
                class="form-control">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>

        </div>


        <div class="mb-4">

            <label class="form-label">
                Status
            </label>

            <select name="status" class="form-select">

                <option
                    value="0"
                    {{ !$galeri->status ? 'selected' : '' }}>

                    Unpublish

                </option>

                <option
                    value="1"
                    {{ $galeri->status ? 'selected' : '' }}>

                    Publish

                </option>

            </select>

        </div>


        <button
            type="submit"
            class="btn btn-danger">

            Simpan Perubahan

        </button>


        <a
            href="{{ route('admin.galeri.index') }}"
            class="btn btn-secondary">

            Batal

        </a>

    </form>

</div>

@endsection