@extends('layouts.app')

@section('content')
<style>
    .detail-berita {
        max-width: 800px;
        margin: 50px auto;
        padding: 0 20px;
    }
    .detail-berita img {
        display: block;
        max-width: 100%;
        height: auto;
        margin: 0 auto 24px;
        border-radius: 16px;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.15);
    }

    .detail-berita .tanggal {
        color: #7a1c2a;
        font-size: 14px;
        margin-bottom: 8px;
    }

    .detail-berita h1 {
        color: #520b19;
        font-size: 32px;
        line-height: 1.3;
        margin: 0 0 20px;
    }

    .detail-berita .isi {
        color: #333;
        font-size: 17px;
        line-height: 1.8;
    }

    .detail-berita .kembali {
        display: inline-block;
        margin-top: 30px;
        padding: 10px 20px;
        background: #520b19;
        color: #fff;
        text-decoration: none;
        border-radius: 8px;
    }

    .detail-berita .kembali:hover {
        background: #7a1c2a;
    }
</style>

<div class="detail-berita">
    @if($berita->gambar)
        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}">
    @endif

    <p class="tanggal">{{ \Carbon\Carbon::parse($berita->tanggal)->translatedFormat('d F Y') }}</p>
    <h1>{{ $berita->judul }}</h1>
    <div class="isi">{!! nl2br(e($berita->isi)) !!}</div>

    <a href="{{ route('berita') }}" class="kembali">← Kembali</a>
</div>
@endsection