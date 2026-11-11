@extends('layouts.app')

@section('title', 'Formulir Pendaftaran PPDB')

@section('content')

<style>
    .formulir-section {
        min-height: 80vh;
        padding: 70px 20px;
    }

    .formulir-container {
        max-width: 800px;
        margin: auto;
    }

    .formulir-header {
        text-align: center;
        margin-bottom: 35px;
    }

    .formulir-header h1 {
        color: #550B18;
        font-size: 36px;
        font-weight: 700;
        margin: 10px 0;
    }

    .formulir-header p {
        color: #550B18;
        font-size: 17px;
    }

    .formulir-card {
        background: #550B18;
        color: #F2E5C5;
        border-radius: 20px;
        padding: 40px;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.12);
    }

    .form-group {
        margin-bottom: 22px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #F2E5C5;
    }

    .form-group input,
    .form-group select,
    .form-group textarea {
        width: 100%;
        padding: 12px 15px;
        border-radius: 10px;
        border: none;
        background: #F2E5C5;
        color: #550B18;
        font-size: 15px;
    }

    .form-group textarea {
        resize: vertical;
        min-height: 90px;
    }

    .form-row {
        display: grid;
        grid-template-columns: 1fr 1fr;
        gap: 20px;
    }

    .form-error {
        color: #ffb3b3;
        font-size: 13px;
        margin-top: 6px;
    }

    .alert-success {
        background: #d4edda;
        color: #155724;
        padding: 14px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
        text-align: center;
        font-weight: 600;
    }

    .alert-error {
        background: #f8d7da;
        color: #721c24;
        padding: 14px 20px;
        border-radius: 10px;
        margin-bottom: 25px;
    }

    .formulir-button-wrapper {
        text-align: center;
        margin-top: 30px;
    }

    .formulir-button {
        display: inline-block;
        background: #f8e7b0;
        color: #550B18;
        padding: 14px 40px;
        border-radius: 10px;
        border: none;
        font-weight: 700;
        font-size: 16px;
        cursor: pointer;
        transition: 0.3s;
    }

    .formulir-button:hover {
        background: white;
        transform: translateY(-3px);
    }

    @media (max-width: 768px) {
        .formulir-card {
            padding: 25px;
        }

        .form-row {
            grid-template-columns: 1fr;
        }
    }
</style>

<section class="formulir-section">
    <div class="formulir-container">

        <div class="formulir-header">
            <h1>Formulir Pendaftaran PPDB</h1>
            <p>Lengkapi data di bawah ini dengan benar. Data kamu hanya bisa dilihat oleh admin sekolah.</p>
        </div>

        <div class="formulir-card">

            @if (session('success'))
                <div class="alert-success">{{ session('success') }}</div>
            @endif

            @if ($errors->any())
                <div class="alert-error">
                    <strong>Periksa kembali isian formulir:</strong>
                    <ul style="margin: 8px 0 0 18px;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ppdb.store') }}" method="POST">
                @csrf

                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap Calon Siswa</label>
                    <input type="text" name="nama_lengkap" id="nama_lengkap"
                        value="{{ old('nama_lengkap') }}" placeholder="Contoh: Ahmad Fauzi">
                </div>

                <div class="form-group">
                    <label for="nisn">NISN (opsional)</label>
                    <input type="text" name="nisn" id="nisn"
                        value="{{ old('nisn') }}" placeholder="Nomor Induk Siswa Nasional">
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="tempat_lahir">Tempat Lahir</label>
                        <input type="text" name="tempat_lahir" id="tempat_lahir"
                            value="{{ old('tempat_lahir') }}" placeholder="Contoh: Tasikmalaya">
                    </div>

                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                    <select name="jenis_kelamin" id="jenis_kelamin">
                        <option value="">-- Pilih Jenis Kelamin --</option>
                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="alamat" placeholder="Alamat tempat tinggal saat ini">{{ old('alamat') }}</textarea>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="no_hp">No. HP / WhatsApp</label>
                        <input type="text" name="no_hp" id="no_hp"
                            value="{{ old('no_hp') }}" placeholder="Contoh: 0812xxxxxxx">
                    </div>

                    <div class="form-group">
                        <label for="nama_orang_tua">Nama Orang Tua / Wali</label>
                        <input type="text" name="nama_orang_tua" id="nama_orang_tua"
                            value="{{ old('nama_orang_tua') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label for="asal_sekolah">Asal Sekolah (SMP/MTs)</label>
                    <input type="text" name="asal_sekolah" id="asal_sekolah"
                        value="{{ old('asal_sekolah') }}" placeholder="Nama SMP/MTs asal">
                </div>

                <div class="form-group">
                    <label for="program_keahlian">Program Keahlian / Kelas Khusus</label>
                    <select name="program_keahlian" id="program_keahlian">
                        <option value="">-- Pilih Program --</option>
                        @foreach ($daftarProgram as $program)
                            <option value="{{ $program }}" {{ old('program_keahlian') == $program ? 'selected' : '' }}>
                                {{ $program }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="formulir-button-wrapper">
                    <button type="submit" class="formulir-button">Kirim Pendaftaran</button>
                </div>

            </form>

        </div>

    </div>
</section>

@endsection