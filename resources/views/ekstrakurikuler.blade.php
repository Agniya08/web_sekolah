@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')

<section class="page-header">

    <span>KEGIATAN SISWA</span>

    <h1>
        Ekstrakurikuler
    </h1>

    <p>
        Wadah untuk mengembangkan bakat dan minat siswa siwi SMK Al-Falah Tanjungjaya.
    </p>

</section>


<section class="section">

    <div class="section-heading">

        <span>PILIHAN KEGIATAN</span>

        <h2>
            Ekstrakurikuler Sekolah
        </h2>

    </div>


    <div class="extra-grid">

        @forelse($ekskul as $item)

            <article class="news-card">

                <div class="news-img" style="height: auto;">
                    @if($item->gambar)
                        <img src="{{ asset('storage/' . $item->gambar) }}"
                             alt="{{ $item->nama }}"
                             style="width: 100%; height: auto; object-fit: initial; display: block;">
                    @endif
                </div>

                <div class="news-body">

                    <h3>
                        {{ $item->nama }}
                    </h3>

                    <p>
                        {{ $item->deskripsi }}
                    </p>

                    <span>
                        {{ $item->kategori }}
                    </span>

                </div>

            </article>

        @empty

            <p>Belum ada data ekstrakurikuler.</p>

        @endforelse

    </div>

</section>

@endsection