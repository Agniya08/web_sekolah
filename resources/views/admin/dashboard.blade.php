@extends('admin.layout')

@section('title', 'Dashboard Admin')

@section('page-title', 'Dashboard')

@section('content')

<div class="container-fluid">

    <h3 class="mb-4">Dashboard</h3>

    <div class="row g-4">

        <!-- BERITA -->
        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <small class="text-muted">Total Berita</small>
                            <h2 class="fw-bold">{{ \App\Models\Berita::count() }}</h2>
                        </div>
                        <div class="fs-1">📰</div>
                    </div>
                    <a href="{{ route('admin.berita.index') }}" class="btn btn-sm btn-outline-danger">Kelola Berita</a>
                </div>
            </div>
        </div>

        <!-- GALERI -->
        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <small class="text-muted">Total Galeri</small>
                            <h2 class="fw-bold">{{ \App\Models\Galeri::count() }}</h2>
                        </div>
                        <div class="fs-1">🖼️</div>
                    </div>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-outline-danger">Kelola Galeri</a>
                </div>
            </div>
        </div>

        <!-- EKSTRAKURIKULER -->
        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">    
                        <div>
                            <small class="text-muted">Total Ekstrakurikuler</small>
                            <h2 class="fw-bold">{{ \App\Models\Ekstrakurikuler::count() }}</h2>
                        </div>
                        <div class="fs-1">🏅</div>
                    </div>
                    <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-sm btn-outline-danger">Kelola Ekstrakurikuler</a>
                </div>
            </div>
        </div>

        <!-- PUBLISHED -->
        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <small class="text-muted">Berita Published</small>
                    <h2 class="fw-bold">{{ \App\Models\Berita::where('status', true)->count() }}</h2>
                    <span class="badge bg-success">Aktif</span>
                </div>
            </div>
        </div>

        <!-- PENDAFTAR PPDB -->
        <div class="col-md-6 col-xl-4">
            <div class="card stat-card shadow-sm">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div>
                            <small class="text-muted">Total Pendaftar PPDB</small>
                            <h2 class="fw-bold">{{ \App\Models\Pendaftaran::count() }}</h2>
                        </div>
                        <div class="fs-1">📋</div>
                    </div>
                    <a href="{{ route('admin.pendaftaran.index') }}" class="btn btn-sm btn-outline-danger">Lihat Pendaftar</a>
                </div>
            </div>
        </div>

    </div>

</div>

@endsection