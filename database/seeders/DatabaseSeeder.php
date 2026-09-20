<?php

namespace Database\Seeders;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Buat User Admin PMB
        $admin = User::firstOrCreate(
            ['email' => 'admin@acai.ac.id'],
            [
                'name' => 'Administrator PMB ACAI',
                'password' => Hash::make('password123'),
                'role' => 'admin',
            ]
        );

        // 2. Buat Data Master Jurusan
        $jurusans = [
            [
                'jenis_jurusan' => 'S1 Teknik Informatika',
                'deskripsi' => 'Program studi yang berfokus pada rekayasa perangkat lunak, kecerdasan buatan (AI), keamanan siber, dan komputasi awan.',
                'jumlah_pendaftar' => 1,
            ],
            [
                'jenis_jurusan' => 'S1 Sistem Informasi',
                'deskripsi' => 'Mempelajari perancangan sistem informasi perusahaan, analisis data bisnis, manajemen basis data, dan UI/UX design.',
                'jumlah_pendaftar' => 0,
            ],
            [
                'jenis_jurusan' => 'S1 Manajemen Bisnis Digital',
                'deskripsi' => 'Menggabungkan strategi bisnis modern, digital marketing, analitika pasar digital, dan kewirausahaan teknologi.',
                'jumlah_pendaftar' => 0,
            ],
            [
                'jenis_jurusan' => 'D3 Manajemen Informatika',
                'deskripsi' => 'Pendidikan vokasi terapan berorientasi industri dalam pemrograman web, mobile app development, dan jaringan komputer.',
                'jumlah_pendaftar' => 0,
            ],
        ];

        $jurusanModels = [];
        foreach ($jurusans as $j) {
            $jurusanModels[] = Jurusan::firstOrCreate(
                ['jenis_jurusan' => $j['jenis_jurusan']],
                $j
            );
        }

        // 3. Buat Calon Mahasiswa Awal untuk Demo Pengujian
        $userMhs = User::firstOrCreate(
            ['email' => 'calon@acai.ac.id'],
            [
                'name' => 'Budi Santoso',
                'password' => Hash::make('password123'),
                'role' => 'mahasiswa',
            ]
        );

        $mhs = Mahasiswa::firstOrCreate(
            ['user_id' => $userMhs->id],
            [
                'nama' => 'Budi Santoso',
                'jenkel' => 'L',
                'tanggal_lahir' => '2005-08-17',
                'asal_sma' => 'SMA Negeri 1 Kota',
                'tahun_lulus' => '2023',
                'pas_foto' => null,
                'ijasah' => null,
                'ktp' => null,
            ]
        );

        Pendaftaran::firstOrCreate(
            ['mahasiswa_id' => $mhs->id],
            [
                'jurusan_id' => $jurusanModels[0]->id,
                'status_admin' => 'Lulus',
                'status_ujian' => 'belum lulus',
            ]
        );
    }
}
