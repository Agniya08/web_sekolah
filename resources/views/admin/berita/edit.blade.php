@extends('admin.layout')

@section('title', 'Edit Berita')

@section('page-title', 'Edit Berita')

@section('content')

<div class="table-card">

    <h4 class="mb-4">
        Edit Berita
    </h4>


    <form action="{{ route('admin.berita.update', $berita->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')


        <div class="mb-3">

            <label class="form-label">
                Tanggal
            </label>

            <input
                type="date"
                name="tanggal"
                class="form-control"
                value="{{ old('tanggal', $berita->tanggal->format('Y-m-d')) }}">

        </div>


        <div class="mb-3">

            <label class="form-label">
                Judul
            </label>

            <input
                type="text"
                name="judul"
                class="form-control"
                value="{{ old('judul', $berita->judul) }}">

        </div>


        <div class="mb-3">

            <label class="form-label d-block">
                Gambar Saat Ini
            </label>

            @if($berita->gambar)

                <img
                    src="{{ asset('storage/' . $berita->gambar) }}"
                    class="mb-3"
                    style="width:180px;height:120px;object-fit:cover;border-radius:10px;">

            @endif

            <input
                type="file"
                name="gambar"
                class="form-control"
                accept="image/*">

            <small class="text-muted">
                Kosongkan jika tidak ingin mengganti gambar.
            </small>

        </div>


        <div class="mb-3">

            <label class="form-label">
                Isi Berita
            </label>

            <textarea
                name="isi"
                rows="6"
                class="form-control">{{ old('isi', $berita->isi) }}</textarea>

        </div>


        <div class="mb-4">

            <label class="form-label">
                Status
            </label>

            <select name="status" class="form-select">

                <option
                    value="0"
                    {{ !$berita->status ? 'selected' : '' }}>

                    Unpublish

                </option>

                <option
                    value="1"
                    {{ $berita->status ? 'selected' : '' }}>

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
            href="{{ route('admin.berita.index') }}"
            class="btn btn-secondary">

            Batal

        </a>

    </form>

</div>

@endsection