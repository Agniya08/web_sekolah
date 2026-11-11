@extends('layouts.app')

@section('title', 'PPDB')

@section('content')

<style>
    .ppdb-section {
       
        min-height: 80vh;
        padding: 70px 20px;
    }

    .ppdb-container {
        max-width: 1100px;
        margin: auto;
    }

    .ppdb-header {
        text-align: center;
        margin-bottom: 45px;
    }

    .ppdb-badge {
        display: inline-block;
        background: #550B18;
        color: #F2E5C5;
        padding: 8px 20px;
        border-radius: 30px;
        font-weight: 600;
        margin-bottom: 15px;
    }

    .ppdb-header h1 {
        color: #550B18;
        font-size: 42px;
        font-weight: 700;
        margin: 10px 0;
    }

    .ppdb-header p {
        color: #550B18;
        font-size: 19px;
    }

    .ppdb-card {
        background: #550B18;
        color: #F2E5C5;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .ppdb-card h2 {
        color: #F2E5C5;
        margin-bottom: 15px;
    }

    .ppdb-card > p {
        line-height: 1.8;

    }

    .ppdb-info {
        display: grid;
        color: #550B18  ;
        grid-template-columns: repeat(3, 1fr);
        gap: 20px;
        margin-top: 30px;
    }

    .info-box {
        background: #F2E5C5 !important;
        padding: 25px;
        border-radius: 15px;
        text-align: center;
        transition: 0.3s;
    }

    .info-box:hover {
        transform: translateY(-5px);
    }

    .info-box h3 {
        color: #550B18 !important;
        font-size: 19px;
        margin-bottom: 10px;
    }

    .info-box p {
    color: #550B18 !important;
    font-size: 15px;
    line-height: 1.6;
    margin: 0;
    }

    .ppdb-button-wrapper {
        text-align: center;
        margin-top: 35px;
    }

    .ppdb-button {
        display: inline-block;
        background: #f8e7b0;
        color: #550B18;
        padding: 14px 32px;
        border-radius: 10px;
        text-decoration: none;
        font-weight: 700;
        transition: 0.3s;
    }

    .ppdb-button:hover {
        background: white;
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {

        .ppdb-section {
            padding: 50px 15px;
        }

        .ppdb-header h1 {
            font-size: 30px;
        }

        .ppdb-card {
            padding: 25px;
        }

        .ppdb-info {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="ppdb-section">

    <div class="ppdb-container">

        <div class="ppdb-header">

            <span class="ppdb-badge">
                PENERIMAAN PESERTA DIDIK BARU
            </span>

            <h1>
                PPDB SMK Al-Falah Tanjungjaya
            </h1>

            <p>
                Mari bergabung bersama SMK Al-Falah Tanjungjaya
                untuk membangun generasi berprestasi dan berkarakter.
            </p>

        </div>


        <div class="ppdb-card">

            <h2>
                Informasi PPDB
            </h2>

            <p>
                SMK Al-Falah Tanjungjaya membuka kesempatan bagi
                calon peserta didik baru untuk bergabung dan
                mengembangkan potensi sesuai dengan minat dan bakat.
            </p>


            <div class="ppdb-info">

                <div class="info-box">

                    <h3>📅 Pendaftaran</h3>

                    <p>
                        Pendaftaran peserta didik baru
                        dibuka sesuai jadwal yang telah ditentukan.
                    </p>

                </div>


                <div class="info-box">

                    <h3>🎓 Program Keahlian</h3>

                    <p>
                        Tersedia tujuh program keahlian
                        sesuai minat dan bakat siswa.
                    </p>

                </div>


                <div class="info-box">

                    <h3>📍 Lokasi Sekolah</h3>

                    <p>
                        Jl. KH. Ahmad Faqih KP. Kebonkalapa,    
                        Desa Cibalanarik, Kec. Tanjungjaya,
                        Kab. Tasikmalaya.
                    </p>

                </div>

            </div>


            <div class="ppdb-button-wrapper">
                    <a href="{{ route('ppdb.create') }}" class="ppdb-button">
                        Daftar Sekarang
                    </a>

            </div>

        </div>

    </div>

</section>

@endsection