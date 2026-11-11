@extends('layouts.app')

@section('title', 'Pendaftaran Berhasil')

@section('content')

<style>
    .sukses-section {
        min-height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 70px 20px;
    }

    .sukses-card {
        max-width: 600px;
        background: #550B18;
        color: #F2E5C5;
        border-radius: 20px;
        padding: 50px 40px;
        text-align: center;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .sukses-card h1 {
        font-size: 30px;
        margin-bottom: 15px;
    }

    .sukses-card p {
        font-size: 16px;
        line-height: 1.7;
        margin-bottom: 25px;
    }

    .sukses-button {
        display: inline-block;
        background: #f8e7b0;
        color: #550B18;
        padding: 14px 32px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s;
    }

    .sukses-button:hover {
        background: white;
        transform: translateY(-3px);
    }
</style>

<section class="sukses-section">
    <div class="sukses-card">
        <h1>✅ Pendaftaran Berhasil Dikirim!</h1>
        <p>{{ session('success', 'Terima kasih telah mendaftar. Data kamu sudah kami terima dan akan diperiksa oleh admin sekolah.') }}</p>
        <a href="{{ route('beranda') }}" class="sukses-button">Kembali ke Beranda</a>
    </div>
</section>

@endsection
