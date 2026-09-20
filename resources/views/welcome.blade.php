@extends('layouts.app')

@section('title', 'PMB ACAI 2026/2027 - Penerimaan Mahasiswa Baru')

@section('content')
<!-- Hero Section -->
<section class="py-5 bg-white border-bottom position-relative overflow-hidden">
    <div class="container py-lg-5">
        <div class="row align-items-center g-5">
            <div class="col-lg-7">
                <div class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-primary-subtle text-primary fw-semibold small mb-3">
                    <span class="badge bg-primary rounded-pill">Buka</span>
                    Gelombang I PMB Tahun Akademik 2026/2027
                </div>
                <h1 class="display-4 fw-extrabold text-dark tracking-tight mb-3">
                    Wujudkan Masa Depan Gemilang Bersama <span class="text-primary">Kampus ACAI</span>
                </h1>
                <p class="lead text-secondary mb-4">
                    Institut & Akademi ACAI menghadirkan kurikulum berbasis industri terkini, teknologi digital mutakhir, dan program magang bersertifikat untuk mencetak lulusan siap kerja berdaya saing global.
                </p>
                <div class="d-flex flex-wrap gap-3">
                    <a href="{{ route('register') }}" class="btn btn-primary-acai btn-lg px-4">
                        <i class="bi bi-pencil-square me-2"></i> Daftar Sekarang
                    </a>
                    <a href="{{ route('login') }}" class="btn btn-outline-secondary btn-lg px-4 fw-semibold">
                        <i class="bi bi-person-check me-2"></i> Cek Status Pendaftaran
                    </a>
                </div>

                <div class="row g-4 mt-4 pt-3 border-top">
                    <div class="col-sm-4 col-6">
                        <div class="h3 fw-bold text-primary mb-0">{{ $totalPendaftar }}+</div>
                        <small class="text-muted">Pendaftar Terdaftar</small>
                    </div>
                    <div class="col-sm-4 col-6">
                        <div class="h3 fw-bold text-success mb-0">{{ $totalLulus }}+</div>
                        <small class="text-muted">Lulus Seleksi</small>
                    </div>
                    <div class="col-sm-4 col-12">
                        <div class="h3 fw-bold text-warning mb-0">Akreditasi A</div>
                        <small class="text-muted">Institusi Unggul</small>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-5">
                <div class="card border-0 shadow-lg rounded-4 overflow-hidden position-relative">
                    <div class="card-header bg-primary text-white p-4">
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-white text-primary fw-bold">ONLINE REGISTRATION</span>
                            <i class="bi bi-shield-check fs-4"></i>
                        </div>
                        <h4 class="fw-bold mt-3 mb-1">Informasi Penerimaan</h4>
                        <small class="text-white-50">Langkah mudah menjadi bagian dari keluarga besar ACAI</small>
                    </div>
                    <div class="card-body p-4 bg-white">
                        <div class="d-flex gap-3 mb-3">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-primary fw-bold" style="width:40px;height:40px;flex-shrink:0;">1</div>
                            <div>
                                <h6 class="fw-bold mb-1">Buat Akun PMB</h6>
                                <p class="text-muted small mb-0">Isi data akun email dan password pada form registrasi.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-3">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-primary fw-bold" style="width:40px;height:40px;flex-shrink:0;">2</div>
                            <div>
                                <h6 class="fw-bold mb-1">Lengkapi Biodata & Upload Berkas</h6>
                                <p class="text-muted small mb-0">Unggah pas foto, ijazah / SKL, dan KTP / Kartu Pelajar.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3 mb-3">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-primary fw-bold" style="width:40px;height:40px;flex-shrink:0;">3</div>
                            <div>
                                <h6 class="fw-bold mb-1">Verifikasi & Seleksi Ujian</h6>
                                <p class="text-muted small mb-0">Panitia memverifikasi dokumen dan melakukan uji seleksi.</p>
                            </div>
                        </div>
                        <div class="d-flex gap-3">
                            <div class="rounded-circle bg-light d-flex align-items-center justify-content-center text-success fw-bold" style="width:40px;height:40px;flex-shrink:0;">4</div>
                            <div>
                                <h6 class="fw-bold mb-1">Pengumuman & Cetak Kartu</h6>
                                <p class="text-muted small mb-0">Dapatkan kartu bukti kelulusan dan registrasi ulang.</p>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-light p-3 text-center border-0">
                        <a href="{{ route('register') }}" class="btn btn-primary w-100 fw-semibold rounded-3">Mulai Pendaftaran Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Program Studi Section -->
<section id="prodi" class="py-5">
    <div class="container py-lg-4">
        <div class="text-center max-w-700 mx-auto mb-5">
            <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill">PILIHAN TERBAIK</span>
            <h2 class="fw-bold mt-2">Program Studi & Jurusan Unggulan</h2>
            <p class="text-muted">Pilih bidang keilmuan yang sesuai dengan minat dan potensi masa depan karir Anda.</p>
        </div>

        <div class="row g-4">
            @forelse($jurusans as $j)
                <div class="col-lg-3 col-md-6">
                    <div class="card h-100 border-0 shadow-sm rounded-4 hover-shadow transition p-4 bg-white">
                        <div class="bg-primary-subtle text-primary rounded-3 d-inline-flex align-items-center justify-content-center mb-3" style="width:50px;height:50px;">
                            <i class="bi bi-laptop fs-4"></i>
                        </div>
                        <h5 class="fw-bold mb-2">{{ $j->jenis_jurusan }}</h5>
                        <p class="text-muted small flex-grow-1">
                            {{ $j->deskripsi ?? 'Kurikulum terapan terintegrasi teknologi digital dan sertifikasi profesional.' }}
                        </p>
                        <div class="border-top pt-3 d-flex justify-content-between align-items-center">
                            <span class="badge bg-light text-secondary border">
                                <i class="bi bi-person me-1"></i> {{ $j->jumlah_pendaftar }} Pendaftar
                            </span>
                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-sm rounded-pill px-3">Pilih Prodi</a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center text-muted py-5">
                    Belum ada program studi yang tersedia.
                </div>
            @endforelse
        </div>
    </div>
</section>

<!-- Alur Pendaftaran Section -->
<section id="alur" class="py-5 bg-white border-top border-bottom">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="badge bg-info-subtle text-info fw-semibold px-3 py-1 rounded-pill">PROSES SELEKSI</span>
            <h2 class="fw-bold mt-2">Alur Pendaftaran Mahasiswa Baru</h2>
            <p class="text-muted">Seluruh tahapan pendaftaran dilakukan secara transparan dan terintegrasi sistem online.</p>
        </div>

        <div class="row g-4 text-center">
            <div class="col-md-3">
                <div class="p-3">
                    <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 shadow" style="width:65px;height:65px;">
                        <i class="bi bi-person-plus fs-3"></i>
                    </div>
                    <h5 class="fw-bold">1. Registrasi Akun</h5>
                    <p class="text-muted small">Buat akun calon mahasiswa dengan email dan buat password akses.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 shadow" style="width:65px;height:65px;">
                        <i class="bi bi-file-earmark-arrow-up fs-3"></i>
                    </div>
                    <h5 class="fw-bold">2. Isi Biodata & Berkas</h5>
                    <p class="text-muted small">Lengkapi formulir diri dan upload dokumen (Pas Foto, Ijazah, KTP).</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <div class="bg-primary text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 shadow" style="width:65px;height:65px;">
                        <i class="bi bi-card-checklist fs-3"></i>
                    </div>
                    <h5 class="fw-bold">3. Verifikasi & Ujian</h5>
                    <p class="text-muted small">Panitia memverifikasi berkas persyaratan dan menjadwalkan seleksi ujian.</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="p-3">
                    <div class="bg-success text-white rounded-circle mx-auto d-flex align-items-center justify-content-center mb-3 shadow" style="width:65px;height:65px;">
                        <i class="bi bi-award fs-3"></i>
                    </div>
                    <h5 class="fw-bold">4. Pengumuman Kelulusan</h5>
                    <p class="text-muted small">Cek kelulusan di portal, cetak bukti kelulusan dan persiapan daftar ulang.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Jadwal Section -->
<section id="jadwal" class="py-5">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="badge bg-warning-subtle text-warning fw-semibold px-3 py-1 rounded-pill">TIMELINE</span>
            <h2 class="fw-bold mt-2">Jadwal Penting PMB 2026</h2>
            <p class="text-muted">Perhatikan tanggal-tanggal penting agar tidak melewatkan kesempatan emas Anda.</p>
        </div>

        <div class="table-responsive bg-white rounded-4 shadow-sm p-4">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th class="py-3">Gelombang</th>
                        <th>Periode Pendaftaran</th>
                        <th>Verifikasi Berkas</th>
                        <th>Pelaksanaan Ujian</th>
                        <th>Pengumuman</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td class="fw-bold text-primary">Gelombang I (Jalur Prestasi)</td>
                        <td>01 Jan - 31 Mar 2026</td>
                        <td>01 - 05 Apr 2026</td>
                        <td>08 Apr 2026</td>
                        <td>15 Apr 2026</td>
                        <td><span class="badge bg-success">Sedang Berlangsung</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-dark">Gelombang II (Jalur Reguler)</td>
                        <td>01 Apr - 30 Jun 2026</td>
                        <td>01 - 05 Jul 2026</td>
                        <td>08 Jul 2026</td>
                        <td>15 Jul 2026</td>
                        <td><span class="badge bg-secondary">Akan Datang</span></td>
                    </tr>
                    <tr>
                        <td class="fw-bold text-dark">Gelombang III (Jalur Mandiri)</td>
                        <td>01 Jul - 20 Agu 2026</td>
                        <td>21 - 23 Agu 2026</td>
                        <td>25 Agu 2026</td>
                        <td>28 Agu 2026</td>
                        <td><span class="badge bg-secondary">Akan Datang</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-5 bg-white border-top">
    <div class="container py-lg-4">
        <div class="text-center mb-5">
            <span class="badge bg-secondary-subtle text-secondary fw-semibold px-3 py-1 rounded-pill">FAQ</span>
            <h2 class="fw-bold mt-2">Pertanyaan Sering Diajukan</h2>
            <p class="text-muted">Informasi cepat mengenai pendaftaran dan persyaratan mahasiswa baru.</p>
        </div>

        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="accordion accordion-flush shadow-sm rounded-4 overflow-hidden border" id="faqAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Berkas apa saja yang perlu diunggah saat mendaftar?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse show" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                Calon mahasiswa wajib mengunggah Pas Foto formal berwarna (JPG/PNG maksimal 2MB), Scan Ijazah SMA/SMK atau Surat Keterangan Lulus (PDF/JPG maksimal 3MB), dan Scan KTP atau Kartu Pelajar (PDF/JPG maksimal 3MB).
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Bagaimana jika ijazah asli belum keluar dari sekolah?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                Bagi lulusan tahun berjalan yang belum menerima ijazah resmi, Anda dapat menggunakan <strong>Surat Keterangan Lulus (SKL)</strong> resmi berstempel dari kepala sekolah.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                Bagaimana cara mengecek kelulusan berkas dan ujian?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body text-secondary">
                                Anda cukup login ke <strong>Portal Mahasiswa</strong> menggunakan akun yang sudah didaftarkan. Status verifikasi berkas dan hasil ujian akan otomatis tertera di dashboard Anda.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
