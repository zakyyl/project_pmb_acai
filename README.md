# 🎓 Sistem Informasi PMB ACAI (Penerimaan Mahasiswa Baru)

Aplikasi Web Sistem Penerimaan Mahasiswa Baru (PMB) untuk Institut & Akademi ACAI berbasis **Laravel 10**, **Bootstrap 5**, dan **MySQL**. Dilengkapi dengan portal mandiri calon mahasiswa, antarmuka verifikasi berkas dan hasil ujian seleksi oleh panitia, serta laporan kelulusan siap cetak.

---

## ✨ Fitur Utama

### 1. Portal Publik & Calon Mahasiswa
* **Landing Page Modern:** Informasi program studi pilihan, jadwal gelombang seleksi, alur pendaftaran, dan FAQ interaktif.
* **Autentikasi Akun:** Registrasi calon mahasiswa baru & login terintegrasi.
* **Formulir Pendaftaran:** Pengisian biodata lengkap (Nama, Jenis Kelamin, TTL, Asal SMA, Tahun Lulus) dan pemilihan program studi / jurusan.
* **Upload Berkas Persyaratan:** Unggah Pas Foto formal (3x4), Scan Ijazah / SKL, dan Scan KTP / Kartu Pelajar.
* **Pelacakan Status Seleksi (Stepper Progress):**
  * Status Verifikasi Berkas Administrasi (*Lulus / Belum Lulus / Tidak Lulus*)
  * Status Hasil Ujian Seleksi Masuk (*Lulus / Belum Lulus / Tidak Lulus*)
* **Cetak Kartu Tanda Peserta Ujian:** Desain kartu resmi ber-KOP surat, barcode registrasi, foto peserta, jadwal ujian CBT, dan tanda tangan digital panitia.

### 2. Panel Administrator / Panitia PMB
* **Dashboard Statistik:** Analisis jumlah pendaftar, rasio kelulusan berkas, kelulusan ujian, dan distribusi pendaftar per jurusan.
* **Manajemen Data Mahasiswa:** Monitoring seluruh pendaftar, pencarian berdasarkan nama/asal sekolah, dan detail profil dokumen.
* **Meja Verifikasi Berkas Dokumen:** Pemeriksaan dokumen yang diunggah dan pembaruan status kelulusan administrasi.
* **Meja Verifikasi Ujian Seleksi:** Penginputan hasil kelulusan Computer Based Test (CBT).
* **Manajemen Program Studi (CRUD Jurusan):** Pengelolaan daftar jurusan, deskripsi, dan kuota pendaftar.
* **Laporan Resmi Siap Cetak (Print-Ready):**
  * Laporan Calon Mahasiswa Lulus Seleksi Administrasi
  * Laporan Calon Mahasiswa Lulus Ujian Masuk

---

## 🛠️ Tech Stack & Requirements

* **Bahasa Pemrograman:** PHP 8.1 / 8.2 / 8.3
* **Framework:** Laravel 10.x
* **Database:** MySQL / MariaDB
* **Frontend:** Blade Templating, Bootstrap 5.3, Bootstrap Icons, Google Fonts (Plus Jakarta Sans)
* **Web Server:** Apache (WampServer / XAMPP / Laragon)

---

## 🚀 Panduan Instalasi Lokal

1. **Clone Repository:**
   ```bash
   git clone https://github.com/zakyyl/project_pmb_acai.git
   cd project_pmb_acai
   ```

2. **Install Dependensi Composer:**
   ```bash
   composer install
   ```

3. **Konfigurasi Environment:**
   Salin file `.env.example` menjadi `.env`:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Pastikan pengaturan database di `.env` sesuai dengan MySQL Anda:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=pmb_acai
   DB_USERNAME=root
   DB_PASSWORD=
   ```

4. **Migrasi Database & Seeder:**
   ```bash
   php artisan migrate:fresh --seed
   ```

5. **Hubungkan Symlink Storage Berkas:**
   ```bash
   php artisan storage:link
   ```

6. **Jalankan Aplikasi:**
   ```bash
   php artisan serve
   ```
   Akses di browser: `http://localhost:8000` *(atau via WampServer: `http://localhost/pmb/project_pmb_acai/public/`)*.

---

## 🔑 Akun Demo Default

| Role | Email | Password |
| :--- | :--- | :--- |
| **Administrator PMB** | `admin@acai.ac.id` | `password123` |
| **Calon Mahasiswa Demo** | `calon@acai.ac.id` | `password123` |

---

## 📄 Lisensi
Dikembangkan di bawah lisensi MIT License.
