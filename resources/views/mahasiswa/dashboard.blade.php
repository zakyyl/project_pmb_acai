@extends('layouts.app')

@section('title', 'Dashboard Calon Mahasiswa - PMB ACAI')

@section('content')
<div class="container py-5">
    <!-- Header Banner -->
    <div class="card border-0 rounded-4 shadow-sm p-4 mb-4 bg-white">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3">
            <div>
                <span class="badge bg-primary-subtle text-primary fw-semibold px-3 py-1 rounded-pill mb-2">Portal Calon Mahasiswa</span>
                <h3 class="fw-bold text-dark mb-1">Halo, {{ Auth::user()->name }}!</h3>
                <p class="text-muted mb-0">Selamat datang di Sistem Informasi PMB ACAI Tahun Akademik 2026/2027.</p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('mahasiswa.formulir') }}" class="btn btn-outline-primary fw-semibold">
                    <i class="bi bi-pencil-square me-1"></i> {{ $mahasiswa ? 'Ubah Data Formulir' : 'Isi Formulir Pendaftaran' }}
                </a>
                @if($mahasiswa && $mahasiswa->pendaftaran)
                    <a href="{{ route('mahasiswa.kartu_ujian') }}" class="btn btn-primary-acai" target="_blank">
                        <i class="bi bi-printer me-1"></i> Cetak Kartu Peserta
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Stepper Status -->
    <div class="card border-0 rounded-4 shadow-sm p-4 mb-4 bg-white">
        <h5 class="fw-bold mb-4"><i class="bi bi-clock-history text-primary me-2"></i>Status Tahapan Pendaftaran</h5>
        
        <div class="row g-3 text-center">
            <!-- Step 1 -->
            <div class="col-md-3 col-6">
                <div class="p-3 rounded-3 bg-success-subtle text-success border border-success-subtle">
                    <i class="bi bi-check-circle-fill fs-2 mb-2 d-block"></i>
                    <h6 class="fw-bold mb-1">1. Registrasi Akun</h6>
                    <span class="badge bg-success">Selesai</span>
                </div>
            </div>

            <!-- Step 2 -->
            <div class="col-md-3 col-6">
                @if($mahasiswa)
                    <div class="p-3 rounded-3 bg-success-subtle text-success border border-success-subtle">
                        <i class="bi bi-check-circle-fill fs-2 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1">2. Biodata & Berkas</h6>
                        <span class="badge bg-success">Terisi</span>
                    </div>
                @else
                    <div class="p-3 rounded-3 bg-warning-subtle text-warning-emphasis border border-warning-subtle">
                        <i class="bi bi-exclamation-circle-fill fs-2 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1">2. Biodata & Berkas</h6>
                        <span class="badge bg-warning text-dark">Belum Lengkap</span>
                    </div>
                @endif
            </div>

            <!-- Step 3 -->
            <div class="col-md-3 col-6">
                @php
                    $statusAdmin = $mahasiswa && $mahasiswa->pendaftaran ? $mahasiswa->pendaftaran->status_admin : 'belum lulus';
                @endphp
                @if($statusAdmin === 'Lulus')
                    <div class="p-3 rounded-3 bg-success-subtle text-success border border-success-subtle">
                        <i class="bi bi-check-circle-fill fs-2 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1">3. Seleksi Administrasi</h6>
                        <span class="badge bg-success">Lulus Verifikasi</span>
                    </div>
                @elseif($statusAdmin === 'Tidak Lulus')
                    <div class="p-3 rounded-3 bg-danger-subtle text-danger border border-danger-subtle">
                        <i class="bi bi-x-circle-fill fs-2 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1">3. Seleksi Administrasi</h6>
                        <span class="badge bg-danger">Tidak Lulus</span>
                    </div>
                @else
                    <div class="p-3 rounded-3 bg-light text-secondary border">
                        <i class="bi bi-hourglass-split fs-2 mb-2 d-block text-warning"></i>
                        <h6 class="fw-bold mb-1">3. Seleksi Administrasi</h6>
                        <span class="badge bg-secondary">Menunggu Verifikasi</span>
                    </div>
                @endif
            </div>

            <!-- Step 4 -->
            <div class="col-md-3 col-6">
                @php
                    $statusUjian = $mahasiswa && $mahasiswa->pendaftaran ? $mahasiswa->pendaftaran->status_ujian : 'belum lulus';
                @endphp
                @if($statusUjian === 'Lulus')
                    <div class="p-3 rounded-3 bg-success-subtle text-success border border-success-subtle">
                        <i class="bi bi-award-fill fs-2 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1">4. Hasil Ujian Masuk</h6>
                        <span class="badge bg-success">LULUS SELEKSI</span>
                    </div>
                @elseif($statusUjian === 'Tidak Lulus')
                    <div class="p-3 rounded-3 bg-danger-subtle text-danger border border-danger-subtle">
                        <i class="bi bi-x-circle-fill fs-2 mb-2 d-block"></i>
                        <h6 class="fw-bold mb-1">4. Hasil Ujian Masuk</h6>
                        <span class="badge bg-danger">Tidak Lulus</span>
                    </div>
                @else
                    <div class="p-3 rounded-3 bg-light text-secondary border">
                        <i class="bi bi-clock fs-2 mb-2 d-block text-muted"></i>
                        <h6 class="fw-bold mb-1">4. Hasil Ujian Masuk</h6>
                        <span class="badge bg-light text-muted border">Belum Ada Hasil</span>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <!-- Content Status Banner -->
    @if(!$mahasiswa)
        <div class="alert alert-warning border-0 rounded-4 p-4 shadow-sm mb-4">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-info-circle-fill fs-3 text-warning"></i>
                <div>
                    <h5 class="fw-bold mb-1">Formulir Pendaftaran Belum Dilengkapi</h5>
                    <p class="mb-3 text-secondary">
                        Anda telah berhasil membuat akun, namun Anda belum mengisi biodata pribadi, pilihan program studi, dan mengunggah berkas persyaratan. Silakan klik tombol di bawah untuk melengkapi.
                    </p>
                    <a href="{{ route('mahasiswa.formulir') }}" class="btn btn-warning fw-bold px-4">
                        <i class="bi bi-pencil-fill me-1"></i> Isi Formulir Sekarang
                    </a>
                </div>
            </div>
        </div>
    @elseif($statusAdmin === 'belum lulus')
        <div class="alert alert-info border-0 rounded-4 p-4 shadow-sm mb-4">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-hourglass-top fs-3 text-info"></i>
                <div>
                    <h5 class="fw-bold mb-1">Dokumen Anda Sedang Ditinjau Panitia</h5>
                    <p class="mb-0 text-secondary">
                        Terima kasih sudah melengkapi berkas. Tim panitia seleksi PMB ACAI sedang memverifikasi keabsahan dokumen persyaratan Anda. Harap periksa status secara berkala.
                    </p>
                </div>
            </div>
        </div>
    @elseif($statusAdmin === 'Lulus' && $statusUjian === 'belum lulus')
        <div class="alert alert-success border-0 rounded-4 p-4 shadow-sm mb-4">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-check-circle-fill fs-3 text-success"></i>
                <div>
                    <h5 class="fw-bold mb-1">Selamat! Berkas Administrasi Anda Dinyatakan Lulus</h5>
                    <p class="mb-3 text-secondary">
                        Berkas dokumen Anda telah memenuhi seluruh kriteria persyaratan PMB ACAI. Silakan cetak Kartu Peserta Ujian Anda untuk mengikuti tahapan Computer Based Test (CBT).
                    </p>
                    <a href="{{ route('mahasiswa.kartu_ujian') }}" class="btn btn-success fw-bold px-4" target="_blank">
                        <i class="bi bi-printer me-1"></i> Unduh / Cetak Kartu Peserta Ujian
                    </a>
                </div>
            </div>
        </div>
    @elseif($statusUjian === 'Lulus')
        <div class="alert alert-success border-0 rounded-4 p-4 shadow-sm mb-4 bg-success text-white">
            <div class="d-flex align-items-start gap-3">
                <i class="bi bi-trophy-fill fs-2"></i>
                <div>
                    <h4 class="fw-bold mb-1">SELAMAT! ANDA DINYATAKAN LULUS SEBAGAI CALON MAHASISWA BARU</h4>
                    <p class="mb-0 text-white-50">
                        Anda telah berhasil lolos seluruh tahapan seleksi administrasi dan ujian masuk pada program studi <strong>{{ $mahasiswa->pendaftaran->jurusan->jenis_jurusan ?? '-' }}</strong>. Silakan segera lakukan konfirmasi pendaftaran ulang di sekretariat PMB ACAI.
                    </p>
                </div>
            </div>
        </div>
    @endif

    <!-- Data Ringkasan Pendaftar -->
    @if($mahasiswa)
        <div class="row g-4">
            <div class="col-lg-4">
                <div class="card border-0 rounded-4 shadow-sm p-4 bg-white text-center h-100">
                    <div class="mb-3">
                        @if($mahasiswa->pas_foto)
                            <img src="{{ asset('storage/' . $mahasiswa->pas_foto) }}" alt="Foto {{ $mahasiswa->nama }}" class="rounded-4 object-fit-cover shadow-sm" style="width:140px;height:175px;">
                        @else
                            <div class="bg-light rounded-4 d-inline-flex align-items-center justify-content-center text-muted mx-auto" style="width:140px;height:175px;">
                                <i class="bi bi-person fs-1"></i>
                            </div>
                        @endif
                    </div>
                    <h5 class="fw-bold mb-1">{{ $mahasiswa->nama }}</h5>
                    <p class="text-muted small mb-3">{{ $mahasiswa->asal_sma }} (Lulus {{ $mahasiswa->tahun_lulus }})</p>

                    <div class="border-top pt-3 text-start">
                        <div class="small text-muted mb-1">Nomor Registrasi:</div>
                        <div class="fw-bold text-primary mb-3">ACAI-{{ date('Y', strtotime($mahasiswa->created_at)) }}-{{ str_pad($mahasiswa->id, 4, '0', STR_PAD_LEFT) }}</div>

                        <div class="small text-muted mb-1">Pilihan Program Studi:</div>
                        <div class="fw-bold text-dark">{{ $mahasiswa->pendaftaran->jurusan->jenis_jurusan ?? 'Belum memilih' }}</div>
                    </div>
                </div>
            </div>

            <div class="col-lg-8">
                <div class="card border-0 rounded-4 shadow-sm p-4 bg-white h-100">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h5 class="fw-bold mb-0">Rincian Formulir Pendaftaran</h5>
                        <a href="{{ route('mahasiswa.formulir') }}" class="btn btn-sm btn-outline-primary">
                            <i class="bi bi-pencil me-1"></i> Edit Data
                        </a>
                    </div>

                    <div class="row g-3">
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Nama Lengkap Sesuai Ijazah</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->nama }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Jenis Kelamin</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->jenkel === 'L' ? 'Laki-Laki' : 'Perempuan' }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Tanggal Lahir</small>
                            <span class="fw-semibold text-dark">{{ date('d F Y', strtotime($mahasiswa->tanggal_lahir)) }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Asal Sekolah</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->asal_sma }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Tahun Kelulusan</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->tahun_lulus }}</span>
                        </div>
                        <div class="col-sm-6">
                            <small class="text-muted d-block">Waktu Pendaftaran</small>
                            <span class="fw-semibold text-dark">{{ $mahasiswa->created_at->format('d/m/Y H:i') }} WIB</span>
                        </div>
                    </div>

                    <hr class="my-4">

                    <h6 class="fw-bold mb-3">Status Berkas Persyaratan Terunggah</h6>
                    <div class="row g-3">
                        <div class="col-sm-4">
                            <div class="p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                                <div class="small fw-semibold">Pas Foto 3x4</div>
                                @if($mahasiswa->pas_foto)
                                    <a href="{{ asset('storage/' . $mahasiswa->pas_foto) }}" target="_blank" class="badge bg-primary text-decoration-none"><i class="bi bi-eye"></i> Lihat</a>
                                @else
                                    <span class="badge bg-danger">Kosong</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                                <div class="small fw-semibold">Ijazah / SKL</div>
                                @if($mahasiswa->ijasah)
                                    <a href="{{ asset('storage/' . $mahasiswa->ijasah) }}" target="_blank" class="badge bg-primary text-decoration-none"><i class="bi bi-eye"></i> Lihat</a>
                                @else
                                    <span class="badge bg-danger">Kosong</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="p-3 bg-light rounded-3 d-flex justify-content-between align-items-center">
                                <div class="small fw-semibold">Scan KTP</div>
                                @if($mahasiswa->ktp)
                                    <a href="{{ asset('storage/' . $mahasiswa->ktp) }}" target="_blank" class="badge bg-primary text-decoration-none"><i class="bi bi-eye"></i> Lihat</a>
                                @else
                                    <span class="badge bg-danger">Kosong</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
@endsection
