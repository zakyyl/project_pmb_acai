# PMB ACAI - Sistem Penerimaan Mahasiswa Baru

Aplikasi web penerimaan mahasiswa baru (PMB) berbasis **Laravel 10** dan **MySQL**. Dikembangkan untuk memfasilitasi proses pendaftaran mandiri calon mahasiswa baru, verifikasi berkas administrasi oleh panitia, pengelolaan ujian seleksi, hingga cetak kartu ujian dan rekap laporan kelulusan.

---

## Daftar Fitur

### 1. Portal Calon Mahasiswa
- **Registrasi & Login:** Pembuatan akun mandiri calon mahasiswa.
- **Formulir Pendaftaran:** Input identitas diri, asal sekolah, tahun lulus, dan pilihan program studi.
- **Upload Berkas Persyaratan:** Unggah pas foto formal, scan ijazah/SKL, dan scan KTP/kartu identitas.
- **Pelacakan Status Seleksi:** Pemantauan progres seleksi secara transparan:
  - Status Verifikasi Berkas Administrasi (*Lulus / Menunggu / Tidak Lulus*)
  - Status Hasil Ujian Masuk (*Lulus / Menunggu / Tidak Lulus*)
- **Cetak Kartu Ujian:** Halaman kartu tanda peserta ujian seleksi dengan format siap cetak (termasuk nomor pendaftaran, jadwal seleksi, dan foto peserta).

### 2. Panel Administrator / Panitia
- **Dashboard Ringkasan:** Statistik jumlah pendaftar, rasio berkas terverifikasi, dan tingkat kelulusan ujian.
- **Manajemen Data Pendaftar:** Daftar seluruh calon mahasiswa beserta detail data dan dokumen pendukung.
- **Verifikasi Dokumen:** Validasi berkas upload dan pembaruan status kelulusan berkas.
- **Verifikasi Hasil Ujian:** Input dan pembaruan hasil ujian seleksi masuk.
- **Manajemen Program Studi:** CRUD daftar jurusan/program studi dan kuota penerimaan.
- **Cetak Laporan Rekap:** Laporan siap cetak untuk arsip panitia:
  - Rekap Mahasiswa Lulus Seleksi Administrasi
  - Rekap Mahasiswa Lulus Ujian Masuk

---

## Tech Stack

- **Backend:** PHP >= 8.1, Laravel 10.x
- **Database:** MySQL / MariaDB
- **Frontend:** Blade Templating, Bootstrap 5.3, Bootstrap Icons
- **Web Server:** Apache (WampServer / XAMPP) atau `php artisan serve`

---

## Kebutuhan Sistem

- PHP 8.1 ke atas
- Ekstensi PHP: `pdo_mysql`, `mbstring`, `fileinfo`, `openssl`, `tokenizer`, `xml`, `ctype`, `json`
- Composer 2.x
- MySQL 5.7+ atau MariaDB 10.3+

---

## Panduan Instalasi Lokal

### 1. Clone Repository
```bash
git clone https://github.com/zakyyl/project_pmb_acai.git
cd project_pmb_acai
```

### 2. Install Dependensi
```bash
composer install
```

### 3. Konfigurasi Environment
Salin file `.env.example` ke `.env`:
```bash
cp .env.example .env
php artisan key:generate
```

Sesuaikan konfigurasi database pada `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=pmb_acai
DB_USERNAME=root
DB_PASSWORD=
```

### 4. Setup Database & Storage
Jalankan migrasi database beserta data awal (seeder):
```bash
php artisan migrate --seed
```

Buat symlink direktori penyimpanan file:
```bash
php artisan storage:link
```

### 5. Menjalankan Aplikasi
Pilih salah satu cara berikut:

- **Menggunakan Laravel Development Server:**
  ```bash
  php artisan serve
  ```
  Buka browser di: `http://127.0.0.1:8000`

- **Menggunakan WampServer / XAMPP:**
  Pastikan folder ditaruh di dalam direktori web server (misal: `www/pmb/project_pmb_acai`), lalu akses:
  `http://localhost/pmb/project_pmb_acai/public/`

---

## Akun Bawaan (Default Seeder)

Setelah menjalankan `php artisan migrate --seed`, akun berikut siap digunakan untuk pengujian:

| Role | Email | Password | Keterangan |
| :--- | :--- | :--- | :--- |
| **Administrator** | `admin@acai.ac.id` | `password123` | Akses penuh ke panel admin & verifikasi |
| **Calon Mahasiswa** | `calon@acai.ac.id` | `password123` | Akses ke portal mahasiswa & cetak kartu |

---

## Struktur Database Inti

- `users` — Data autentikasi dan peran akun (`role: admin / mahasiswa`).
- `jurusans` — Master data program studi, deskripsi, dan kuota pendaftaran.
- `mahasiswas` — Profil lengkap pendaftar, biodata, dan path file dokumen berkas.
- `pendaftarans` — Relasi pendaftaran mahasiswa ke jurusan, status verifikasi administrasi, dan kelulusan ujian.

---

## Pengujian Otomatis

Proyek ini telah dilengkapi dengan feature test untuk memastikan alur utama berfungsi normal:

```bash
php artisan test
```

---

## Riwayat Versi & Branch

- `master` (**v2.0**) — Versi rekonstruksi modern berbasis Laravel 10, arsitektur MVC bersih, Blade views responsif, dan validasi berkas.
- `legacy` (**v1.0-kuliah**) — Arsip kode versi lama masa perkuliahan sebagai riwayat histori pengembangan.

---

## Lisensi

Proyek ini dirilis di bawah lisensi [MIT](LICENSE).
