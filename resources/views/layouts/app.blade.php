<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        @yield('title') - SMKS Al-Falah Tanjungjaya
    </title>

    <link rel="stylesheet"
          href="{{ asset('css/style.css') }}">

</head>

<body>

<header class="navbar">

    <div class="nav-container">

        <a href="{{ route('beranda') }}" class="logo">
            <img src="{{ asset('images/logo-al-falah.png') }}" alt="Logo SMK Al-Falah">
            <span>SMK AL-FALAH</span>
        </a>
           
        <button class="menu-button"
                onclick="toggleMenu()">

            ☰

        </button>


        <nav id="navMenu">

            <a href="{{ route('beranda') }}"
               class="{{ request()->routeIs('beranda') ? 'active' : '' }}">
                Beranda
            </a>

            <a href="{{ route('profil') }}"
               class="{{ request()->routeIs('profil') ? 'active' : '' }}">
                Profil Sekolah
            </a>

            <a href="{{ route('ekstrakurikuler') }}"
               class="{{ request()->routeIs('ekstrakurikuler') ? 'active' : '' }}">
                Ekstrakurikuler
            </a>

            <a href="{{ route('galeri') }}"
               class="{{ request()->routeIs('galeri') ? 'active' : '' }}">
                Galeri
            </a>

            <a href="{{ route('berita') }}"
               class="{{ request()->routeIs('berita') ? 'active' : '' }}">
                Berita
            </a>

            <a href="{{ route('ppdb') }}"
                class="{{ request()->routeIs('ppdb') ? 'active' : '' }}">
                 PPDB
            </a>
        </nav>

    </div>

</header>


<main>

    @yield('content')

</main>


<footer>

    <div class="footer-container">

        <!-- BAGIAN SEKOLAH -->
        <div class="footer-school">

            <h2>SMKS AL-FALAH TANJUNGJAYA</h2>

            <p>
                Unggul dalam prestasi,
                berkarakter dalam perilaku.
            </p>

            <!-- MAPS DI BAWAH TEKS -->
            <div class="maps-wrapper">

                <iframe
                    src="https://www.google.com/maps?q=SMK+Al-Falah+Tanjung+Jaya&output=embed"
                    loading="lazy"
                    allowfullscreen>
                </iframe>

                <a
                    href="https://www.google.com/maps/search/?api=1&query=SMK+Al-Falah+Tanjung+Jaya"
                    target="_blank"
                    rel="noopener noreferrer"
                    class="btn-maps">
                    📍 Buka di Google Maps
                </a>

            </div>

        </div>


        <!-- BAGIAN KONTAK -->
        <div class="footer-contact">

            <h3>Kontak</h3>

            <p>
                📍 Jl. KH. Ahmad Faqih KP. Kebonkalapa,
                Desa Cibalanarik, Kec. Tanjungjaya,
                Kab. Tasikmalaya, Jawa Barat 46184.
            </p>

            <p>📞 0812-3456-7890</p>

            <p>📩 alfalahtanjungjayasmk@gmail.com</p>

            <p>✉️ smkalfalahtanjungjaya.sch.id</p>

        </div>

    </div>


    <!-- COPYRIGHT -->
    <div class="copyright">
        © 2026 SMKS Al-Falah Tanjungjaya
    </div>

</footer>


<script>

function toggleMenu()
{
    document
        .getElementById('navMenu')
        .classList.toggle('show');
}

</script>

</body>

</html>