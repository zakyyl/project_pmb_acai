@extends('layouts.admin')

@section('title', 'Dashboard Utama - Admin PMB ACAI')
@section('page_title', 'Ringkasan & Statistik PMB ACAI')

@section('content')
<!-- Metric Cards -->
<div class="row g-3 mb-4">
    <!-- Total Pendaftar -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-stat p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">Total Calon Mahasiswa</span>
                    <h3 class="fw-bold mb-0 text-dark mt-1">{{ $totalMahasiswa }}</h3>
                    <small class="text-primary fw-semibold"><i class="bi bi-person-badge me-1"></i>Akun Terdaftar</small>
                </div>
                <div class="icon-shape bg-primary-subtle text-primary">
                    <i class="bi bi-people-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Lulus Berkas Administrasi -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-stat p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">Lulus Administrasi</span>
                    <h3 class="fw-bold mb-0 text-success mt-1">{{ $lulusAdmin }}</h3>
                    <small class="text-success fw-semibold"><i class="bi bi-check-circle me-1"></i>Berkas Valid</small>
                </div>
                <div class="icon-shape bg-success-subtle text-success">
                    <i class="bi bi-file-earmark-check-fill"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Menunggu Verifikasi -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-stat p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">Menunggu Verifikasi</span>
                    <h3 class="fw-bold mb-0 text-warning mt-1">{{ $pendingAdmin }}</h3>
                    <small class="text-warning-emphasis fw-semibold"><i class="bi bi-hourglass-split me-1"></i>Perlu Ditinjau</small>
                </div>
                <div class="icon-shape bg-warning-subtle text-warning">
                    <i class="bi bi-clock-history"></i>
                </div>
            </div>
        </div>
    </div>

    <!-- Lulus Ujian Masuk -->
    <div class="col-xl-3 col-sm-6">
        <div class="card card-stat p-3">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <span class="text-muted small fw-semibold">Lulus Ujian Seleksi</span>
                    <h3 class="fw-bold mb-0 text-info mt-1">{{ $lulusUjian }}</h3>
                    <small class="text-info fw-semibold"><i class="bi bi-award me-1"></i>Siap Daftar Ulang</small>
                </div>
                <div class="icon-shape bg-info-subtle text-info">
                    <i class="bi bi-trophy-fill"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    <!-- Pendaftar per Program Studi -->
    <div class="col-lg-7">
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h6 class="fw-bold mb-0">Distribusi Pendaftar per Program Studi</h6>
                <a href="{{ route('admin.jurusan.index') }}" class="btn btn-sm btn-outline-primary">Kelola Jurusan</a>
            </div>

            <div class="d-flex flex-column gap-3">
                @foreach($jurusans as $j)
                    @php
                        $percentage = $totalMahasiswa > 0 ? round(($j->pendaftaran_count / $totalMahasiswa) * 100) : 0;
                    @endphp
                    <div>
                        <div class="d-flex justify-content-between small fw-semibold mb-1">
                            <span>{{ $j->jenis_jurusan }}</span>
                            <span class="text-primary">{{ $j->pendaftaran_count }} Pendaftar ({{ $percentage }}%)</span>
                        </div>
                        <div class="progress" style="height: 8px;">
                            <div class="progress-bar bg-primary" role="progressbar" style="width: {{ $percentage }}%"></div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Quick Action / Shortcut -->
    <div class="col-lg-5">
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4 h-100">
            <h6 class="fw-bold mb-3">Tindakan Cepat</h6>
            <div class="d-grid gap-2">
                <a href="{{ route('admin.dokumen.index') }}" class="btn btn-light text-start p-3 rounded-3 border d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-file-earmark-check-fill text-primary fs-4"></i>
                        <div>
                            <div class="fw-semibold">Verifikasi Berkas Pendaftar</div>
                            <small class="text-muted">Periksa kesesuaian dokumen calon mahasiswa</small>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>

                <a href="{{ route('admin.ujian.index') }}" class="btn btn-light text-start p-3 rounded-3 border d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-pencil-square text-success fs-4"></i>
                        <div>
                            <div class="fw-semibold">Input Hasil Ujian CBT</div>
                            <small class="text-muted">Tentukan kelulusan ujian masuk mahasiswa</small>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>

                <a href="{{ route('admin.laporan.administrasi') }}" class="btn btn-light text-start p-3 rounded-3 border d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center gap-3">
                        <i class="bi bi-printer-fill text-warning fs-4"></i>
                        <div>
                            <div class="fw-semibold">Cetak Laporan Kelulusan</div>
                            <small class="text-muted">Ekspor & cetak daftar kelulusan administrasi & ujian</small>
                        </div>
                    </div>
                    <i class="bi bi-chevron-right text-muted"></i>
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Pendaftar Terbaru -->
<div class="card border-0 rounded-4 shadow-sm bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h6 class="fw-bold mb-0">Pendaftar Terbaru</h6>
        <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-sm btn-link text-primary fw-semibold text-decoration-none">Lihat Semua Mahasiswa &rarr;</a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th>Nama Calon Mahasiswa</th>
                    <th>Asal Sekolah</th>
                    <th>Jurusan Pilihan</th>
                    <th>Status Berkas</th>
                    <th>Status Ujian</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentPendaftar as $m)
                    @php
                        $statusAdmin = $m->pendaftaran->status_admin ?? 'belum lulus';
                        $statusUjian = $m->pendaftaran->status_ujian ?? 'belum lulus';
                    @endphp
                    <tr>
                        <td>
                            <div class="d-flex align-items-center gap-2">
                                <div class="bg-light rounded-circle text-primary fw-bold d-flex align-items-center justify-content-center" style="width:34px;height:34px;">
                                    {{ substr($m->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div class="fw-semibold text-dark">{{ $m->nama }}</div>
                                    <small class="text-muted">{{ $m->user->email ?? '-' }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $m->asal_sma }}</td>
                        <td><span class="badge bg-light text-dark border">{{ $m->pendaftaran->jurusan->jenis_jurusan ?? '-' }}</span></td>
                        <td>
                            @if($statusAdmin === 'Lulus')
                                <span class="badge bg-success">Lulus</span>
                            @elseif($statusAdmin === 'Tidak Lulus')
                                <span class="badge bg-danger">Tidak Lulus</span>
                            @else
                                <span class="badge bg-warning text-dark">Belum Verif</span>
                            @endif
                        </td>
                        <td>
                            @if($statusUjian === 'Lulus')
                                <span class="badge bg-success">Lulus</span>
                            @elseif($statusUjian === 'Tidak Lulus')
                                <span class="badge bg-danger">Tidak Lulus</span>
                            @else
                                <span class="badge bg-secondary">Belum Ujian</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('admin.mahasiswa.show', $m->id) }}" class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> Detail
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-4 text-muted">Belum ada data pendaftar.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
