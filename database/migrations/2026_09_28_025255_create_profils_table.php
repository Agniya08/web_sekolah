<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('profils', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->string('npsn')->nullable();
            $table->string('status_sekolah')->nullable();
            $table->string('jenjang')->nullable();
            $table->text('alamat')->nullable();
            $table->string('akreditasi')->nullable();
            $table->string('kepala_sekolah')->nullable();
            $table->unsignedInteger('jumlah_guru')->default(0);
            $table->unsignedInteger('jumlah_siswa')->default(0);
            $table->string('email')->nullable();
            $table->string('telepon')->nullable();
            $table->text('tentang')->nullable();
            $table->string('visi_judul')->nullable();
            $table->text('visi')->nullable();
            $table->string('misi_judul')->nullable();
            $table->text('misi')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profils');
    }
};
