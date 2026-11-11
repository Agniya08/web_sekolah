@extends('layouts.app')

@section('title', 'Galeri')

@section('content')

<section class="page-header">

    <span>Dokumentasi Sekolah</span>

    <h1>Galeri</h1>

    <p>
        Dokumentasi kegiatan dan aktivitas siswa siswi SMK Al-Falah Tanjungjaya.
    </p>

</section>


<section class="section">

    <div class="galeri-grid">

        @forelse($galeri as $item)

            <div class="galeri-card">

                {{-- GAMBAR --}}
           <div class="galeri-image">

               <img
                    src="{{ asset('storage/' . $item->gambar) }}"
                    alt="{{ $item->judul }}">
            </div>


                {{-- ISI --}}
                <div class="galeri-content">

                    <h3>
                        {{ $item->judul }}
                    </h3>

                    <p>
                        {{ $item->deskripsi }}
                    </p>

                </div>

            </div>

        @empty

            <div class="galeri-empty">
                Belum ada dokumentasi galeri.
            </div>

        @endforelse

    </div>

</section>

@endsection