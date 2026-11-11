@extends('layouts.app')

@section('content')
<div class="container">
    <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
    <p>{{ $berita->tanggal }}</p>
    <h1>{{ $berita->judul }}</h1>
    <div>{!! nl2br(e($berita->isi)) !!}</div>
    <a href="{{ route('berita.index') }}">← Kembali</a>
</div>
@endsection