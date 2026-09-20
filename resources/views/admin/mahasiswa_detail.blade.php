@extends('layouts.admin')

@section('title', 'Detail Calon Mahasiswa - ' . $mahasiswa->nama)
@section('page_title', 'Profil Calon Mahasiswa')

@section('content')
<div class="mb-4">
    <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-sm btn-light border">
        <i class="bi bi-arrow-left me-1"></i> Kembali ke Data Mahasiswa
    </a>
</div>

<div class="row g-4">
    <div class="col-lg-4">
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4 text-center">
            <div class="mb-3">
                @if($mahasiswa->pas_foto)
                    <img src="{{ asset('storage/' . $mahasiswa->pas_foto) }}" class="rounded-4 object-fit-cover shadow" style="width:150px;height:190px;">
                @else
                    <div class="bg-light rounded-4 d-inline-flex align-items-center justify-content-center text-muted mx-auto" style="width:150px;height:190px;">
                        <i class="bi bi-person fs-1"></i>
                    </div>
                @endif
            </div>
            <h5 class="fw-bold mb-1">{{ $mahasiswa->nama }}</h5>
            <p class="text-muted small mb-3">{{ $mahasiswa->user->email ?? '-' }}</p>

            <div class="border-top pt-3 text-start">
                <div class="small text-muted mb-1">Nomor Registrasi:</div>
                <div class="fw-bold text-primary mb-3">ACAI-{{ date('Y', strtotime($mahasiswa->created_at)) }}-{{ str_pad($mahasiswa->id, 4, '0', STR_PAD_LEFT) }}</div>

                <div class="small text-muted mb-1">Pilihan Jurusan:</div>
                <div class="fw-bold text-dark mb-3">{{ $mahasiswa->pendaftaran->jurusan->jenis_jurusan ?? '-' }}</div>

                <div class="small text-muted mb-1">Tanggal Pendaftaran:</div>
                <div class="text-dark">{{ $mahasiswa->created_at->format('d F Y, H:i') }} WIB</div>
            </div>
        </div>

        <!-- Quick Status Update Card -->
        @if($mahasiswa->pendaftaran)
            <div class="card border-0 rounded-4 shadow-sm bg-white p-4 mt-4">
                <h6 class="fw-bold mb-3"><i class="bi bi-sliders me-2 text-primary"></i>Ubah Status Pendaftaran</h6>
                <form action="{{ route('admin.mahasiswa.update', $mahasiswa->pendaftaran->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Status Seleksi Administrasi</label>
                        <select name="status_admin" class="form-select form-select-sm">
                            <option value="belum lulus" {{ $mahasiswa->pendaftaran->status_admin === 'belum lulus' ? 'selected' : '' }}>Belum Lulus / Menunggu</option>
                            <option value="Lulus" {{ $mahasiswa->pendaftaran->status_admin === 'Lulus' ? 'selected' : '' }}>Lulus Administrasi</option>
                            <option value="Tidak Lulus" {{ $mahasiswa->pendaftaran->status_admin === 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Status Ujian Masuk</label>
                        <select name="status_ujian" class="form-select form-select-sm">
                            <option value="belum lulus" {{ $mahasiswa->pendaftaran->status_ujian === 'belum lulus' ? 'selected' : '' }}>Belum Lulus / Belum Ujian</option>
                            <option value="Lulus" {{ $mahasiswa->pendaftaran->status_ujian === 'Lulus' ? 'selected' : '' }}>Lulus Ujian Masuk</option>
                            <option value="Tidak Lulus" {{ $mahasiswa->pendaftaran->status_ujian === 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                        </select>
                    </div>

                    <button type="submit" class="btn btn-primary btn-sm w-100 fw-semibold">
                        <i class="bi bi-save me-1"></i> Perbarui Status
                    </button>
                </form>
            </div>
        @endif
    </div>

    <div class="col-lg-8">
        <!-- Biodata Card -->
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4 mb-4">
            <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-info-circle me-2"></i>Informasi Lengkap Calon Mahasiswa</h6>
            <div class="row g-3">
                <div class="col-sm-6">
                    <small class="text-muted d-block">Nama Lengkap</small>
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
                    <small class="text-muted d-block">Alamat Email Terdaftar</small>
                    <span class="fw-semibold text-dark">{{ $mahasiswa->user->email ?? '-' }}</span>
                </div>
            </div>
        </div>

        <!-- Berkas Card -->
        <div class="card border-0 rounded-4 shadow-sm bg-white p-4">
            <h6 class="fw-bold mb-3 text-primary"><i class="bi bi-file-earmark-arrow-down me-2"></i>Dokumen Persyaratan</h6>
            <div class="row g-3">
                <!-- Pas Foto -->
                <div class="col-md-4">
                    <div class="border rounded-3 p-3 bg-light text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="fw-semibold small mb-2">Pas Foto 3x4</div>
                            @if($mahasiswa->pas_foto)
                                <img src="{{ asset('storage/' . $mahasiswa->pas_foto) }}" class="rounded shadow-sm mb-2" style="max-height:100px;object-fit:cover;">
                            @else
                                <div class="text-danger small mb-2">Belum Diunggah</div>
                            @endif
                        </div>
                        @if($mahasiswa->pas_foto)
                            <a href="{{ asset('storage/' . $mahasiswa->pas_foto) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-eye"></i> Buka Foto
                            </a>
                        @endif
                    </div>
                </div>

                <!-- Ijazah -->
                <div class="col-md-4">
                    <div class="border rounded-3 p-3 bg-light text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="fw-semibold small mb-2">Scan Ijazah / SKL</div>
                            @if($mahasiswa->ijasah)
                                <i class="bi bi-file-earmark-pdf fs-1 text-danger d-block mb-1"></i>
                                <span class="badge bg-success mb-2">Tersedia</span>
                            @else
                                <div class="text-danger small mb-2">Belum Diunggah</div>
                            @endif
                        </div>
                        @if($mahasiswa->ijasah)
                            <a href="{{ asset('storage/' . $mahasiswa->ijasah) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-eye"></i> Buka Ijazah
                            </a>
                        @endif
                    </div>
                </div>

                <!-- KTP -->
                <div class="col-md-4">
                    <div class="border rounded-3 p-3 bg-light text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="fw-semibold small mb-2">Scan KTP / Kartu Pelajar</div>
                            @if($mahasiswa->ktp)
                                <i class="bi bi-file-earmark-image fs-1 text-primary d-block mb-1"></i>
                                <span class="badge bg-success mb-2">Tersedia</span>
                            @else
                                <div class="text-danger small mb-2">Belum Diunggah</div>
                            @endif
                        </div>
                        @if($mahasiswa->ktp)
                            <a href="{{ asset('storage/' . $mahasiswa->ktp) }}" target="_blank" class="btn btn-sm btn-outline-primary w-100">
                                <i class="bi bi-eye"></i> Buka KTP
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
