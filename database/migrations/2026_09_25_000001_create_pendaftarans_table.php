<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pendaftarans', function (Blueprint $table) {
            $table->id();

            // Data Calon Siswa
            $table->string('nama_lengkap');
            $table->string('nisn', 20)->nullable();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->enum('jenis_kelamin', ['Laki-laki', 'Perempuan']);
            $table->text('alamat');
            $table->string('no_hp', 20);
            $table->string('nama_orang_tua');
            $table->string('asal_sekolah');

            // Program Keahlian / Kelas Khusus
            $table->string('program_keahlian');

            // Status Pendaftaran (dikelola admin)
            $table->enum('status', ['Baru Masuk', 'Diverifikasi', 'Diterima', 'Ditolak'])
                  ->default('Baru Masuk');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pendaftarans');
    }
};