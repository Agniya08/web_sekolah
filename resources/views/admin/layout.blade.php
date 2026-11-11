<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>@yield('title', 'Admin') - SMK Al-Falah</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"
    >

    <style>

        body {
            background: #f5f6fa;
        }

        .sidebar {
            min-height: 100vh;
            background: #550B18;
        }

        .sidebar a {
            color: white;
            text-decoration: none;
            display: block;
            padding: 12px 18px;
            border-radius: 8px;
            margin-bottom: 5px;
        }

        .sidebar a:hover {
            background: rgba(255,255,255,0.15);
        }

        .admin-logo {
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .content-area {
            padding: 30px;
        }

        .admin-card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.08);
        }

        .table img {
            width: 80px;
            height: 60px;
            object-fit: cover;
            border-radius: 8px;
        }

        @media (max-width: 768px) {

            .sidebar {
                min-height: auto;
            }

            .content-area {
                padding: 20px 12px;
            }

            .table-responsive {
                font-size: 14px;
            }

        }

    </style>

</head>

<body>

<div class="container-fluid">

    <div class="row">

        <!-- SIDEBAR -->

        <aside class="col-lg-2 col-md-3 sidebar p-3">

            <div class="admin-logo mb-4">
                ADMIN SMK AL-FALAH
            </div>

            <a href="{{ url('/admin') }}">
                📰 Dashboard
            </a>

            <a href="{{ url('/admin/profil') }}">
                🏫 Profil Sekolah
            </a>

            <a href="{{ url('/admin/berita') }}">
                📰 Berita
            </a>

            <a href="{{ url('/admin/galeri') }}">
                🖼️ Galeri
            </a>

            <a href="{{ url('/admin/ekstrakurikuler') }}">
                🏃 Ekstrakurikuler
            </a>

            <a href="{{ url('/admin/jurusan') }}">
                🎓 Jurusan
            </a>

            <a href="{{ url('/admin/pendaftaran') }}">
                📋 Data Pendaftar PPDB
            </a>

            <a href="{{ url('/') }}">
                🌐 Lihat Website
            </a>

            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf

                <button type="submit"
                        class="btn w-100 text-start"
                        style="
                            color: white;
                            background: transparent;
                            border: none;
                            padding: 12px 18px;
                            border-radius: 8px;
                        ">
                    🚪 Logout
                </button>
            </form>

        </aside>


        <!-- CONTENT -->

        <main class="col-lg-10 col-md-9">

            <div class="content-area">

                @if(session('success'))

                    <div class="alert alert-success alert-dismissible fade show">

                        {{ session('success') }}

                        <button
                            type="button"
                            class="btn-close"
                            data-bs-dismiss="alert">
                        </button>

                    </div>

                @endif


                @if($errors->any())

                    <div class="alert alert-danger">

                        <strong>Terjadi kesalahan:</strong>

                        <ul class="mb-0">

                            @foreach($errors->all() as $error)

                                <li>{{ $error }}</li>

                            @endforeach

                        </ul>

                    </div>

                @endif


                @yield('content')

            </div>

        </main>

    </div>

</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>