    @extends('layouts.app')

    @section('title', 'Beranda')

    @section('content')


    <section class="hero" style="background-image: linear-gradient(rgba(255,255,255,0.55), rgba(255,255,255,0.55)), url('{{ asset('images/angkatan.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat;">

        <div class="hero-content">

            <span class="badge">
                SELAMAT DATANG
            </span>

            <h1>
                Membangun Generasi
                <span>Berprestasi</span>
            </h1>

            <p>
                SMKS Al-Falah Tanjungjaya merupakan sekolah yang
                berkomitmen mencetak generasi muda yang
                kompeten, kreatif, berkarakter, dan siap
                menghadapi masa depan.<br>
                Serta siap mendidik siswa/siswi menjadi pribadi yang memiliki keunggulan agar siap menghadapi persaingan global dengan kekuatan akhlak dan kompetensi yang memadai.
            </p>

            <div class="hero-buttons">

                <a href="{{ route('profil') }}"
                class="btn-primary">

                    Lihat Profil →

                </a>

                <a href="{{ route('galeri') }}"
                class="btn-secondary">

                    Lihat Galeri

                </a>

            </div>

        </div>


        <div class="hero-card">

            <img src="{{ asset('images/logo-al-falah.png') }}" alt="Logo SMKS Al-Falah" class="logo-sekolah">

            <h2>
                SMKS AL-FALAH TANJUNGJAYA
            </h2>

            <p>
                "Unggul dalam Prestasi,
                Berkarakter dalam Perilaku"
            </p>

        </div>

    </section>


    <section class="stats-section">
    
        <div class="stats-wrapper">

            <div class="stats-card">
                <span class="icon">👨‍🏫</span>
                <h3>{{ $guru }}</h3>
                <p>Guru & Tenaga Kependidikan</p>
            </div>

            <div class="stats-card">
                <span class="icon">🎓</span>
                <h3>{{ $siswa }}</h3>
                <p>Jumlah Siswa</p>
            </div>

            <div class="stats-card">
                <span class="icon">🏆</span>
                <h3>{{ $prestasi }}</h3>
                <p>Prestasi Sekolah</p>
            </div>

            <div class="stats-card">
                <span class="icon">🎯</span>
                <h3>{{ $ekstrakurikuler }}</h3>
                <p>Ekstrakurikuler</p>
            </div>

        </div>

    </section>


    <section class="section">

        <div class="section-heading">

            <span>INFORMASI TERBARU</span>

            <h2>
                Berita & Kegiatan Sekolah
            </h2>

            <p>
                Informasi terbaru mengenai kegiatan sekolah.
            </p>

        </div>

        <div class="news-grid">

            <!-- BERITA 1 -->
            <article class="news-card">

                <div class="news-img">
                    <img src="{{ asset('images/mpls.jpeg') }}" alt="MPLS">
                </div>

                <div class="news-body">

                    <small>
                        15 Juli 2026
                    </small>

                    <h3>
                        Apel Masa Pengenalan Lingkungan Sekolah
                    </h3>

                    <p>
                        Kegiatan pengenalan lingkungan sekolah
                        bagi peserta didik baru.
                    </p>

                    <a href="{{ route('berita') }}">
                        Selengkapnya →
                    </a>

                </div>

            </article>


            <!-- BERITA 2 -->
            <article class="news-card">

                <div class="news-img">
                    <img src="{{ asset('images/prestasi.jpeg') }}" alt="Prestasi">
                </div>

                <div class="news-body">

                    <small>
                        10 Agustus 2026
                    </small>

                    <h3>
                        Top skors sepriangan timur
                    </h3>

                    <p>
                        Prestasi membanggakan siswa SMK Al-Falah.
                    </p>

                    <a href="{{ route('berita') }}">
                        Selengkapnya →
                    </a>

                </div>

            </article>


            <!-- BERITA 3 -->
            <article class="news-card">

                <div class="news-img">
                    <img src="{{ asset('images/duha.jpeg') }}" alt="Pembiasaan pagi">
                </div>

                <div class="news-body">

                    <small>
                        24 Agustus 2026
                    </small>

                    <h3>
                        Pembiasaan Pagi Sebelum Pembelajaran
                    </h3>

                    <p>
                        Kegiatan pembiasaan pagi sebelum pembelajaran
                        dimulai di SMK Al-Falah.
                    </p>

                    <a href="{{ route('berita') }}">
                        Selengkapnya →
                    </a>

                </div>

            </article>

        </div>

    </section>


    <!-- =========================
        BANNER PPDB
    ========================= -->

    <section class="ppdb-banner">

        <div class="ppdb-banner-content">

            <h1>
                Penerimaan Peserta Didik Baru
            </h1>

            <h2>
                SMK Al Falah Tanjungjaya Boarding School
            </h2>

            <h3>
                TAHUN AJARAN 2025/2026
            </h3>

            <a href="{{ url('/ppdb') }}" class="ppdb-button">
                DAFTAR SEKARANG <span>»</span>
            </a>

        </div>

    </section>




   {{-- =========================
     JURUSAN & KELAS KHUSUS
========================= --}}

<section class="jurusan-section">

    <div class="jurusan-container">

        <div class="jurusan-heading">

            <span>Program Keahlian</span>

            <h2>Jurusan di SMK Al-Falah</h2>

            <p>
                Pilihan program keahlian yang tersedia di SMK Al-Falah Tanjungjaya.
            </p>

        </div>


        <div class="jurusan-grid">

            @forelse($jurusan as $item)

                <div class="jurusan-card">

                    @if($item->gambar)
                        <img
                            src="{{ asset('storage/' . $item->gambar) }}"
                            alt="{{ $item->nama }}"
                            class="jurusan-image"
                        >
                    @endif

                    <div class="jurusan-content">

                        <h3>
                            {{ $item->nama }}
                        </h3>

                        <p>
                            {{ $item->deskripsi }}
                        </p>

                    </div>

                </div>

            @empty

                <p>Belum ada data jurusan.</p>

            @endforelse

        </div>


        @if($kelasKhusus->count())

            <div class="kelas-khusus-heading">

                <span>Program Unggulan</span>

                <h2>Kelas Khusus</h2>

                <p>
                    Program kelas khusus yang tersedia untuk peserta didik.
                </p>

            </div>


            <div class="kelas-khusus-grid">

                @foreach($kelasKhusus as $item)

                    <div class="kelas-card">

                        @if($item->gambar)
                            <img
                                src="{{ asset('storage/' . $item->gambar) }}"
                                alt="{{ $item->nama }}"
                                class="jurusan-image"
                            >
                        @endif

                        <h3>
                            {{ $item->nama }}
                        </h3>

                        <p>
                            {{ $item->deskripsi }}
                        </p>

                    </div>

                @endforeach

            </div>

        @endif

    </div>

</section>

    @endsection