@extends('layouts.app')

@section('title', 'Berita')

@section('content')

<section class="page-header">

    <span>Informasi Terkini</span>

    <h1>
        Berita & Kegiatan
    </h1>

    <p>
        Berita dan informasi kegiatan sekolah.
    </p>

</section>


<section class="section">

    <div class="news-grid">

        @forelse($berita as $item)

        <article class="news-card">

            {{-- GAMBAR BERITA --}}
            @if($item->gambar)

                <div class="news-icon">
                    <div class="galeri-image">

                        <img 
                            src="{{ asset('storage/' . $item->gambar) }}" 
                            alt="{{ $item->judul }}"
                        >

                    </div>
                </div>

            @endif


            {{-- ISI BERITA --}}
            <div class="news-body">

                {{-- TANGGAL --}}
                <small>
                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d F Y') }}
                </small>


                {{-- JUDUL --}}
                <h3>
                    {{ $item->judul }}
                </h3>


                {{-- DESKRIPSI --}}
                <p>
                    {{ $item->isi }}
                </p>


                {{-- TOMBOL --}}
            <a href="{{ route('berita.show', $item->id) }}">Selengkapnya →</a>

            </div>

        </article>

        @empty

        <p>
            Belum ada berita yang dipublikasikan.
        </p>

        @endforelse

    </div>

</section>

@endsection