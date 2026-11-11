<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class JurusanSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            // ===== JURUSAN =====
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'rpl.png',
                'nama'      => 'Rekayasa Perangkat Lunak',
                'deskripsi' => 'Jurusan yang mempelajari pengembangan perangkat lunak dan teknologi digital. Siswa dibekali keterampilan dalam pemrograman, pembuatan aplikasi dan website, pengelolaan basis data, serta pemecahan masalah menggunakan teknologi.',
            ],
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'akl.png',
                'nama'      => 'Akuntansi Keuangan Lembaga',
                'deskripsi' => 'Jurusan yang mempelajari pengelolaan keuangan, pencatatan transaksi, akuntansi, perpajakan, serta administrasi keuangan dalam sebuah perusahaan atau lembaga.',
            ],
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'tb.png',
                'nama'      => 'Tata Busana',
                'deskripsi' => 'Jurusan yang mempelajari keterampilan membuat dan merancang busana, mulai dari menggambar desain, memilih bahan, membuat pola menjahit, hingga menghasilkan pakaian yang berkualitas.',
            ],
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'mp.png',
                'nama'      => 'Manajemen Perkantoran dan Layanan Bisnis',
                'deskripsi' => 'Jurusan yang mempelajari pengelolaan administrasi perkantoran, pelayanan bisnis, pengarsipan, komunikasi, pengelolaan dokumen, serta penggunaan teknologi perkantoran.',
            ],
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'dkv.png',
                'nama'      => 'Desain Komunikasi Visual',
                'deskripsi' => 'Jurusan yang mempelajari desain dan teknologi dalam menyampaikan pesan melalui desain visual, seperti ilustrasi, fotografi, desain grafis, branding, dan media digital.',
            ],
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'tkj.png',
                'nama'      => 'Teknik Jaringan Komputer',
                'deskripsi' => 'Jurusan yang mempelajari perakitan dan pemeliharaan komputer, jaringan komputer, instalasi sistem, konfigurasi jaringan, serta dasar keamanan jaringan dan teknologi informasi.',
            ],
            [
                'tipe'      => 'jurusan',
                'gambar'    => 'tsm.png',
                'nama'      => 'Teknik Sepeda Motor',
                'deskripsi' => 'Jurusan yang mempelajari teknik perawatan, perbaikan, dan pemeriksaan sepeda motor, termasuk mesin, kelistrikan, sistem bahan bakar, transmisi, serta teknologi kendaraan bermotor.',
            ],

            // ===== KELAS KHUSUS =====
            [
                'tipe'      => 'kelas_khusus',
                'gambar'    => 'atlit.jpeg',
                'nama'      => 'Kelas Khusus Atlit',
                'deskripsi' => 'Kelas Khusus Atlet merupakan program unggulan yang memberikan kesempatan kepada siswa untuk mengembangkan potensi dan prestasi di bidang olahraga. Program ini memadukan pendidikan dengan pembinaan olahraga secara terarah agar siswa dapat berprestasi baik dalam bidang akademik maupun olahraga.',
            ],
            [
                'tipe'      => 'kelas_khusus',
                'gambar'    => 'kkye.jpeg',
                'nama'      => 'Kelas Khusus Yamaha',
                'deskripsi' => 'Kelas Khusus Yamaha merupakan program kejuruan yang memberikan pembelajaran dan pengalaman praktis di bidang otomotif, khususnya sepeda motor. Siswa dibekali pengetahuan dan keterampilan dasar dalam perawatan, pemeriksaan, serta perbaikan kendaraan agar siap menghadapi dunia kerja.',
            ],
            [
                'tipe'      => 'kelas_khusus',
                'gambar'    => 'tahfizz.jpeg',
                'nama'      => 'Kelas Khusus Tahfiz',
                'deskripsi' => "Kelas Khusus Tahfiz merupakan program unggulan yang berfokus pada pembinaan dan pengembangan kemampuan siswa dalam menghafal Al-Qur'an. Program ini tidak hanya menekankan pencapaian hafalan, tetapi juga membentuk kedisiplinan, kecintaan terhadap Al-Qur'an, serta karakter dan akhlak yang baik.",
            ],
        ];

        File::ensureDirectoryExists(storage_path('app/public/jurusan'));

        foreach ($data as $item) {
            $gambar = null;
            $sumber = public_path('images/jurusan/' . $item['gambar']);

            // Salin gambar lama ke storage, supaya polanya sama dengan upload dari admin
            if (File::exists($sumber)) {
                File::copy($sumber, storage_path('app/public/jurusan/' . $item['gambar']));
                $gambar = 'jurusan/' . $item['gambar'];
            }

            Jurusan::updateOrCreate(
                ['nama' => $item['nama'], 'tipe' => $item['tipe']],
                [
                    'deskripsi' => $item['deskripsi'],
                    'gambar'    => $gambar,
                ]
            );
        }
    }
}