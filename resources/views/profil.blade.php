@extends('layouts.app')

@section('title', 'Profil Sekolah')

@section('content')

<section class="page-header">

    <span>INFORMASI SEKOLAH</span>

    <h1>
        Profil Sekolah
    </h1>

    <p>
        Mengenal lebih dekat {{ $profil->nama_sekolah }}
    </p>

</section>


<section class="section">

    <div class="about">

        <div class="icon-sekolah">
            <img src="{{ asset('images/logo-al-falah.png') }}" alt="Logo">
        </div>

        <div>

            <h2>
                Tentang Sekolah
            </h2>

            @foreach(preg_split('/\R{2,}/', trim($profil->tentang ?? '')) as $paragraf)
                @if($paragraf !== '')
                    <p>{{ $paragraf }}</p>
                @endif
            @endforeach

        </div>

    </div>


    <div class="table-box">

        <h2>
            Informasi Profil Sekolah
        </h2>

        <table>

            <tr>
                <th>Nama Sekolah</th>
                <td>{{ $profil->nama_sekolah }}</td>
            </tr>

            <tr>
                <th>NPSN</th>
                <td>{{ $profil->npsn }}</td>
            </tr>

            <tr>
                <th>Status Sekolah</th>
                <td>{{ $profil->status_sekolah }}</td>
            </tr>

            <tr>
                <th>Jenjang Pendidikan</th>
                <td>{{ $profil->jenjang }}</td>
            </tr>

            <tr>
                <th>Alamat</th>
                <td>{{ $profil->alamat }}</td>
            </tr>

            <tr>
                <th>Akreditasi</th>
                <td>{{ $profil->akreditasi }}</td>
            </tr>

            <tr>
                <th>Kepala Sekolah</th>
                <td>{{ $profil->kepala_sekolah }}</td>
            </tr>

            <tr>
                <th>Jumlah Guru</th>
                <td>{{ $profil->jumlah_guru }} Orang</td>
            </tr>

            <tr>
                <th>Jumlah Siswa</th>
                <td>{{ $profil->jumlah_siswa }} Siswa</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $profil->email }}</td>
            </tr>

            <tr>
                <th>Telepon</th>
                <td>{{ $profil->telepon }}</td>
            </tr>

        </table>

    </div>


    <div class="vision-grid">

        <div class="info-box" style="background-color: #550B18 !important; color: #F2E5C5 !important;">

            <span>VISI</span>

            <h2>
                {{ $profil->visi_judul }}
            </h2>

            <p>
                {{ $profil->visi }}
            </p>

        </div>


        <div class="info-box" style="background-color: #550B18 !important; color: #F2E5C5 !important;">

            <span>MISI</span>

            <h2>
                {{ $profil->misi_judul }}
            </h2>

            <p>
                {{ $profil->misi }}
            </p>

        </div>

    </div>

</section>

@endsection