<?php

namespace Database\Seeders;

use App\Models\Ekstrakurikuler;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class EkstrakurikulerSeeder extends Seeder
{
    public function run(): void
    {
        $data = [
            [
                'gambar'    => 'futsal.jpeg',
                'nama'      => 'Futsal',
                'kategori'  => 'Olahraga',
                'deskripsi' => 'Mengembangkan bakat siswa dalam bidang olahraga futsal.',
            ],
            [
                'gambar'    => 'ipnu.jpeg',
                'nama'      => 'IPNU/IPPNU',
                'kategori'  => 'Keagamaan',
                'deskripsi' => 'Meningkatkan keimanan siswa siswi SMK Al-Falah.',
            ],
            [
                'gambar'    => 'silat.jpeg',
                'nama'      => 'Pencak Silat',
                'kategori'  => 'Bela Diri',
                'deskripsi' => 'Melatih pertahanan diri siswa siswi.',
            ],
            [
                'gambar'    => 'paskib.jpeg',
                'nama'      => 'Paskibra',
                'kategori'  => 'PBB',
                'deskripsi' => 'Mengembangkan kemampuan siswa dalam baris-berbaris.',
            ],
            [
                'gambar'    => 'pmr.jpeg',
                'nama'      => 'PMR',
                'kategori'  => 'Kesehatan',
                'deskripsi' => 'Mengasah kemampuan siswa dalam menangani siswa yang sakit.',
            ],
            [
                'gambar'    => 'senii.png',
                'nama'      => 'Sanggar Seni',
                'kategori'  => 'Pengembangan Diri',
                'deskripsi' => 'Melatih kemampuan vokal siswa siswi.',
            ],
            [
                'gambar'    => 'pks.jpeg',
                'nama'      => 'PKS',
                'kategori'  => 'Tata Tertib Lalu-lintas',
                'deskripsi' => 'Mengembangkan kemampuan dan pengetahuan siswa tentang aturan di jalan raya.',
            ],
            [
                'gambar'    => 'pramuka.jpeg',
                'nama'      => 'Pramuka',
                'kategori'  => 'Organisasi',
                'deskripsi' => 'Membentuk karakter, kedisiplinan, dan jiwa kepemimpinan.',
            ],
        ];

        File::ensureDirectoryExists(storage_path('app/public/ekstrakurikuler'));

        foreach ($data as $item) {
            $gambar = null;
            $sumber = public_path('images/' . $item['gambar']);

            // Salin gambar lama ke storage, supaya polanya sama dengan upload dari admin
            if (File::exists($sumber)) {
                File::copy($sumber, storage_path('app/public/ekstrakurikuler/' . $item['gambar']));
                $gambar = 'ekstrakurikuler/' . $item['gambar'];
            }

            Ekstrakurikuler::updateOrCreate(
                ['nama' => $item['nama']],
                [
                    'kategori'  => $item['kategori'],
                    'deskripsi' => $item['deskripsi'],
                    'gambar'    => $gambar,
                ]
            );
        }
    }
}