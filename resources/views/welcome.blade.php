@extends('layouts.app')

@section('title', 'PMB ACAI 2026/2027 - Penerimaan Mahasiswa Baru')

@push('styles')
<style>
    /* Hero Section: 100% Viewport Height (Fit screen, no cut off) */
    .hero-acai-section {
        position: relative;
        background-image: url('{{ asset('storage/images/HERO.png') }}');
        background-size: cover;
        background-position: center bottom;
        background-repeat: no-repeat;
        width: 100%;
        min-height: calc(100vh - 68px);
        display: flex;
        align-items: center;
        padding-top: 1rem;
        padding-bottom: 1.5rem;
    }

    @media (min-width: 992px) {
        .hero-acai-section {
            height: calc(100vh - 68px);
            max-height: calc(100vh - 68px);
            overflow: hidden;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
        }
    }

    .hero-main-title {
        font-size: clamp(2.2rem, 3.1vw, 3.3rem);
        font-weight: 800;
        color: #0f1e36;
        line-height: 1.1;
        letter-spacing: -0.03em;
    }

    .hero-desc {
        color: #475569;
        font-size: clamp(0.88rem, 1vw, 0.98rem);
        line-height: 1.55;
        max-width: 500px;
        font-weight: 450;
    }

    .hero-btn-primary {
        background: #0066ff;
        border: none;
        color: #ffffff;
        border-radius: 9px;
        font-size: 0.92rem;
        font-weight: 700;
        padding: 10px 22px;
        box-shadow: 0 4px 16px rgba(0, 102, 255, 0.32);
        transition: all 0.2s ease;
    }
    .hero-btn-primary:hover {
        background: #0052cc;
        color: #ffffff;
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(0, 102, 255, 0.42);
    }

    .hero-btn-outline {
        background: #ffffff;
        color: #0f1e36;
        border: 1.5px solid #0066ff;
        border-radius: 9px;
        font-size: 0.92rem;
        font-weight: 700;
        padding: 9px 20px;
        box-shadow: 0 3px 10px rgba(0, 0, 0, 0.04);
        transition: all 0.2s ease;
    }
    .hero-btn-outline:hover {
        background: #f0f7ff;
        color: #0066ff;
        transform: translateY(-1px);
    }

    .hero-stats-card {
        background: #ffffff;
        border-radius: 16px !important;
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.06);
        border: 1px solid rgba(226, 232, 240, 0.9);
        display: inline-flex;
        align-items: center;
        gap: 1.5rem;
    }

    .hero-card-registration {
        width: 100%;
        max-width: 410px;
        border-radius: 20px;
        box-shadow: 0 16px 40px rgba(15, 23, 42, 0.15) !important;
        border: 1px solid rgba(255, 255, 255, 0.9);
        overflow: hidden;
    }

    @media (max-width: 991px) {
        .hero-acai-section {
            min-height: auto;
            padding-top: 2rem;
            padding-bottom: 3rem;
        }
        .hero-card-registration {
            max-width: 100%;
            margin-top: 1.5rem;
        }
    }

    @media (max-width: 576px) {
        .hero-stats-card {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.75rem;
            width: 100%;
        }
        .stat-divider {
            display: none !important;
        }
    }
</style>
@endpush

@section('content')
<!-- Hero Section (Full Height Fit Screen) -->
<section class="hero-acai-section position-relative">
    <div class="container-fluid px-4 px-lg-5 w-100" style="max-width: 1440px;">
        <div class="row align-items-center g-3 g-xl-4">
            
            <!-- Left Column: Content -->
            <div class="col-lg-7">
                <!-- Pill Badge -->
                <div class="d-inline-flex align-items-center gap-2 px-2.5 py-1 mb-2 mb-xl-3 rounded-pill shadow-sm"
                     style="background: rgba(224, 242, 254, 0.92); backdrop-filter: blur(8px); border: 1px solid rgba(186, 230, 253, 0.9);">
                    <span class="badge rounded-pill px-2 py-0.5 text-white fw-bold d-inline-flex align-items-center gap-1"
                          style="background: #0066ff; font-size: 10.5px;">
                        <span style="display:inline-block; width:5px; height:5px; background:#fff; border-radius:50%;"></span>
                        Buka
                    </span>
                    <span class="fw-semibold small" style="color: #0066ff; font-size: 12.5px;">
                        Gelombang I PMB Tahun Akademik 2026/2027
                    </span>
                </div>

                <!-- Main Headline -->
                <h1 class="hero-main-title mb-2 mb-xl-3">
                    Wujudkan Masa Depan<br>
                    Gemilang Bersama<br>
                    <span style="color: #0066ff;">Kampus ACAI</span>
                </h1>

                <!-- Subtitle -->
                <p class="hero-desc mb-3 mb-xl-4">
                    Institut & Akademi ACAI menghadirkan kurikulum berbasis industri terkini, teknologi digital mutakhir, dan program magang bersertifikat untuk mencetak lulusan siap kerja berdaya saing global.
                </p>

                <!-- CTA Buttons -->
                <div class="d-flex flex-wrap align-items-center gap-2.5 mb-3 mb-xl-4">
                    <a href="{{ route('register') }}" class="btn hero-btn-primary d-inline-flex align-items-center gap-2">
                        <i class="bi bi-pencil-square fs-6"></i>
                        <span>Daftar Sekarang</span>
                        <i class="bi bi-arrow-right fs-6 ms-1"></i>
                    </a>
                    <a href="{{ route('login') }}" class="btn hero-btn-outline d-inline-flex align-items-center gap-2">
                        <i class="bi bi-person text-primary fs-5"></i>
                        <span>Cek Status Pendaftaran</span>
                    </a>
                </div>

                <!-- Bottom Floating Stats Card -->
                <div class="hero-stats-card p-2.5 p-md-3">
                    <!-- Stat 1 -->
                    <div class="d-flex align-items-center gap-2.5">
                        <div class="fs-3 d-flex align-items-center text-primary">
                            <i class="bi bi-people-fill" style="color: #0066ff;"></i>
                        </div>
                        <div>
                            <div class="fw-bolder fs-5 text-dark lh-1 mb-0.5">{{ $totalPendaftar }}+</div>
                            <div class="text-secondary small fw-medium" style="font-size: 11.5px;">Pendaftar Terdaftar</div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="stat-divider d-none d-sm-block" style="width: 1px; height: 30px; background: #e2e8f0;"></div>

                    <!-- Stat 2 -->
                    <div class="d-flex align-items-center gap-2.5">
                        <div class="fs-3 d-flex align-items-center text-primary">
                            <i class="bi bi-mortarboard-fill" style="color: #0066ff;"></i>
                        </div>
                        <div>
                            <div class="fw-bolder fs-5 text-dark lh-1 mb-0.5">{{ $totalLulus }}+</div>
                            <div class="text-secondary small fw-medium" style="font-size: 11.5px;">Lulus Seleksi</div>
                        </div>
                    </div>

                    <!-- Divider -->
                    <div class="stat-divider d-none d-sm-block" style="width: 1px; height: 30px; background: #e2e8f0;"></div>

                    <!-- Stat 3 -->
                    <div class="d-flex align-items-center gap-2.5">
                        <div class="fs-3 d-flex align-items-center text-primary">
                            <i class="bi bi-shield-check" style="color: #0066ff;"></i>
                        </div>
                        <div>
                            <div class="fw-bolder fs-6 text-dark lh-1 mb-0.5">Akreditasi A</div>
                            <div class="text-secondary small fw-medium" style="font-size: 11.5px;">Institusi Unggul</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Column: Registration Card -->
            <div class="col-lg-5 d-flex justify-content-lg-end">
                <div class="hero-card-registration bg-white">
                    <!-- Header -->
                    <div class="px-3.5 py-3 text-white" style="background: #0066ff;">
                        <div class="d-flex justify-content-between align-items-center mb-1.5">
                            <span class="badge px-2.5 py-0.5 rounded-pill fw-bold"
                                  style="background: rgba(255, 255, 255, 0.22); color: #ffffff; font-size: 10px; letter-spacing: 0.08em; border: 1px solid rgba(255, 255, 255, 0.35);">
                                ONLINE REGISTRATION
                            </span>
                            <i class="bi bi-shield-check text-white fs-5"></i>
                        </div>
                        <h5 class="fw-bold text-white mb-0.5" style="font-size: 1.15rem;">Informasi Penerimaan</h5>
                        <p class="text-white-50 mb-0" style="font-size: 11.5px;">
                            Langkah mudah menjadi bagian dari keluarga besar ACAI!
                        </p>
                    </div>

                    <!-- Steps Body -->
                    <div class="px-3.5 py-3 bg-white d-flex flex-column gap-2.5">
                        <!-- Step 1 -->
                        <div class="d-flex align-items-start gap-2.5">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 30px; height: 30px; background: #e0f2fe; color: #0066ff; flex-shrink: 0; font-size: 13px;">
                                1
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13.5px;">Buat Akun PMB</h6>
                                <p class="text-secondary mb-0" style="font-size: 11.5px; line-height: 1.35;">
                                    Isi data akun email dan password pada form registrasi.
                                </p>
                            </div>
                        </div>

                        <!-- Step 2 -->
                        <div class="d-flex align-items-start gap-2.5">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 30px; height: 30px; background: #e0f2fe; color: #0066ff; flex-shrink: 0; font-size: 13px;">
                                2
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13.5px;">Lengkapi Biodata & Upload Berkas</h6>
                                <p class="text-secondary mb-0" style="font-size: 11.5px; line-height: 1.35;">
                                    Unggah pas foto, ijazah / SKL, dan KTP / Kartu Pelajar.
                                </p>
                            </div>
                        </div>

                        <!-- Step 3 -->
                        <div class="d-flex align-items-start gap-2.5">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 30px; height: 30px; background: #e0f2fe; color: #0066ff; flex-shrink: 0; font-size: 13px;">
                                3
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13.5px;">Verifikasi & Seleksi Ujian</h6>
                                <p class="text-secondary mb-0" style="font-size: 11.5px; line-height: 1.35;">
                                    Panitia memverifikasi dokumen dan melakukan uji seleksi.
                                </p>
                            </div>
                        </div>

                        <!-- Step 4 -->
                        <div class="d-flex align-items-start gap-2.5">
                            <div class="rounded-circle d-flex align-items-center justify-content-center fw-bold"
                                 style="width: 30px; height: 30px; background: #e0f2fe; color: #0066ff; flex-shrink: 0; font-size: 13px;">
                                4
                            </div>
                            <div>
                                <h6 class="fw-bold mb-0 text-dark" style="font-size: 13.5px;">Pengumuman & Cetak Kartu</h6>
                                <p class="text-secondary mb-0" style="font-size: 11.5px; line-height: 1.35;">
                                    Dapatkan kartu bukti kelulusan dan registrasi ulang.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Footer CTA Button -->
                    <div class="px-3.5 pb-3 bg-white">
                        <a href="{{ route('register') }}"
                           class="btn w-100 py-2.5 rounded-pill fw-bold text-white text-center d-block"
                           style="background: #0066ff; font-size: 13.5px; box-shadow: 0 4px 14px rgba(0, 102, 255, 0.32); transition: all 0.2s ease;">
                            Mulai Pendaftaran Sekarang
                        </a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- Program Studi Section -->
<section id="prodi" class="py-5">
    <div class="container-fluid px-4 px-xl-5 py-lg-4" style="max-width: 1400px;">
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
    <div class="container-fluid px-4 px-xl-5 py-lg-4" style="max-width: 1400px;">
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
    <div class="container-fluid px-4 px-xl-5 py-lg-4" style="max-width: 1400px;">
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
    <div class="container-fluid px-4 px-xl-5 py-lg-4" style="max-width: 1400px;">
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
