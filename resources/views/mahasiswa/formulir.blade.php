@extends('layouts.app')

@section('title', 'Formulir Pendaftaran - PMB ACAI')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-9">
            <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                <div class="card-header bg-primary text-white p-4">
                    <div class="d-flex align-items-center gap-3">
                        <div class="bg-white text-primary rounded-circle d-flex align-items-center justify-content-center" style="width:48px;height:48px;">
                            <i class="bi bi-file-earmark-text fs-4"></i>
                        </div>
                        <div>
                            <h4 class="fw-bold mb-0">Formulir Pendaftaran Mahasiswa Baru</h4>
                            <small class="text-white-50">Silakan isi data diri dan berkas persyaratan secara valid</small>
                        </div>
                    </div>
                </div>

                <div class="card-body p-4 p-md-5">
                    @if($errors->any())
                        <div class="alert alert-danger rounded-3 mb-4">
                            <h6 class="fw-bold mb-2"><i class="bi bi-exclamation-triangle-fill me-2"></i>Terdapat beberapa kesalahan pengisian:</h6>
                            <ul class="mb-0 small ps-3">
                                @foreach($errors->all() as $err)
                                    <li>{{ $err }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('mahasiswa.formulir.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <!-- Bagian 1: Data Diri -->
                        <div class="d-flex align-items-center gap-2 mb-3 text-primary">
                            <i class="bi bi-person-lines-fill fs-5"></i>
                            <h5 class="fw-bold mb-0">1. Biodata Calon Mahasiswa</h5>
                        </div>

                        <div class="row g-3 mb-4">
                            <div class="col-md-12">
                                <label for="nama" class="form-label fw-semibold">Nama Lengkap (Sesuai Ijazah) <span class="text-danger">*</span></label>
                                <input type="text" name="nama" id="nama" class="form-control @error('nama') is-invalid @enderror" value="{{ old('nama', $mahasiswa->nama ?? Auth::user()->name) }}" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label fw-semibold">Jenis Kelamin <span class="text-danger">*</span></label>
                                <div class="d-flex gap-4 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenkel" id="jenkelL" value="L" {{ old('jenkel', $mahasiswa->jenkel ?? '') === 'L' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="jenkelL">Laki-Laki</label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="jenkel" id="jenkelP" value="P" {{ old('jenkel', $mahasiswa->jenkel ?? '') === 'P' ? 'checked' : '' }} required>
                                        <label class="form-check-label" for="jenkelP">Perempuan</label>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label for="tanggal_lahir" class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                                <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="form-control @error('tanggal_lahir') is-invalid @enderror" value="{{ old('tanggal_lahir', $mahasiswa->tanggal_lahir ?? '') }}" required>
                            </div>

                            <div class="col-md-8">
                                <label for="asal_sma" class="form-label fw-semibold">Asal Sekolah (SMA / SMK / MA) <span class="text-danger">*</span></label>
                                <input type="text" name="asal_sma" id="asal_sma" class="form-control @error('asal_sma') is-invalid @enderror" value="{{ old('asal_sma', $mahasiswa->asal_sma ?? '') }}" placeholder="Contoh: SMA Negeri 1 Jakarta" required>
                            </div>

                            <div class="col-md-4">
                                <label for="tahun_lulus" class="form-label fw-semibold">Tahun Kelulusan <span class="text-danger">*</span></label>
                                <input type="number" name="tahun_lulus" id="tahun_lulus" class="form-control @error('tahun_lulus') is-invalid @enderror" value="{{ old('tahun_lulus', $mahasiswa->tahun_lulus ?? date('Y')) }}" min="2015" max="{{ date('Y') + 1 }}" required>
                            </div>
                        </div>

                        <hr class="my-4">

                        <!-- Bagian 2: Pilihan Program Studi -->
                        <div class="d-flex align-items-center gap-2 mb-3 text-primary">
                            <i class="bi bi-mortarboard-fill fs-5"></i>
                            <h5 class="fw-bold mb-0">2. Pilihan Program Studi / Jurusan</h5>
                        </div>

                        <div class="mb-4">
                            <label for="jurusan_id" class="form-label fw-semibold">Pilih Jurusan yang Dituju <span class="text-danger">*</span></label>
                            <select name="jurusan_id" id="jurusan_id" class="form-select form-select-lg @error('jurusan_id') is-invalid @enderror" required>
                                <option value="">-- Pilih Program Studi --</option>
                                @php
                                    $currentJurusan = $mahasiswa && $mahasiswa->pendaftaran ? $mahasiswa->pendaftaran->jurusan_id : null;
                                @endphp
                                @foreach($jurusans as $j)
                                    <option value="{{ $j->id }}" {{ old('jurusan_id', $currentJurusan) == $j->id ? 'selected' : '' }}>
                                        {{ $j->jenis_jurusan }} ({{ $j->jumlah_pendaftar }} pendaftar)
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <hr class="my-4">

                        <!-- Bagian 3: Unggah Berkas -->
                        <div class="d-flex align-items-center gap-2 mb-3 text-primary">
                            <i class="bi bi-file-earmark-arrow-up fs-5"></i>
                            <h5 class="fw-bold mb-0">3. Berkas Persyaratan</h5>
                        </div>
                        <p class="text-muted small mb-4">Pastikan dokumen jelas terbaca. Format file yang diizinkan: JPG, PNG, atau PDF.</p>

                        <div class="row g-4 mb-4">
                            <!-- Pas Foto -->
                            <div class="col-md-4">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <label for="pas_foto" class="form-label fw-semibold">
                                        Pas Foto Formal (3x4)
                                        @if(!$mahasiswa || !$mahasiswa->pas_foto) <span class="text-danger">*</span> @endif
                                    </label>
                                    @if($mahasiswa && $mahasiswa->pas_foto)
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $mahasiswa->pas_foto) }}" class="rounded-3 shadow-sm d-block mb-1" style="height:90px;width:72px;object-fit:cover;">
                                            <small class="text-success fw-semibold"><i class="bi bi-check-circle"></i> Sudah diunggah</small>
                                        </div>
                                    @endif
                                    <input type="file" name="pas_foto" id="pas_foto" class="form-control form-control-sm @error('pas_foto') is-invalid @enderror" accept="image/jpeg,image/png">
                                    <small class="text-muted" style="font-size:0.75rem;">Maksimal 2 MB (JPG/PNG)</small>
                                </div>
                            </div>

                            <!-- Ijazah / SKL -->
                            <div class="col-md-4">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <label for="ijasah" class="form-label fw-semibold">
                                        Scan Ijazah / SKL
                                        @if(!$mahasiswa || !$mahasiswa->ijasah) <span class="text-danger">*</span> @endif
                                    </label>
                                    @if($mahasiswa && $mahasiswa->ijasah)
                                        <div class="mb-2">
                                            <a href="{{ asset('storage/' . $mahasiswa->ijasah) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-1">
                                                <i class="bi bi-eye"></i> Lihat Berkas
                                            </a>
                                            <div class="text-success fw-semibold small"><i class="bi bi-check-circle"></i> Sudah diunggah</div>
                                        </div>
                                    @endif
                                    <input type="file" name="ijasah" id="ijasah" class="form-control form-control-sm @error('ijasah') is-invalid @enderror" accept=".pdf,image/jpeg,image/png">
                                    <small class="text-muted" style="font-size:0.75rem;">Maksimal 3 MB (PDF/JPG)</small>
                                </div>
                            </div>

                            <!-- KTP / Kartu Pelajar -->
                            <div class="col-md-4">
                                <div class="p-3 border rounded-3 bg-light h-100">
                                    <label for="ktp" class="form-label fw-semibold">
                                        Scan KTP / Kartu Pelajar
                                        @if(!$mahasiswa || !$mahasiswa->ktp) <span class="text-danger">*</span> @endif
                                    </label>
                                    @if($mahasiswa && $mahasiswa->ktp)
                                        <div class="mb-2">
                                            <a href="{{ asset('storage/' . $mahasiswa->ktp) }}" target="_blank" class="btn btn-sm btn-outline-primary mb-1">
                                                <i class="bi bi-eye"></i> Lihat Berkas
                                            </a>
                                            <div class="text-success fw-semibold small"><i class="bi bi-check-circle"></i> Sudah diunggah</div>
                                        </div>
                                    @endif
                                    <input type="file" name="ktp" id="ktp" class="form-control form-control-sm @error('ktp') is-invalid @enderror" accept=".pdf,image/jpeg,image/png">
                                    <small class="text-muted" style="font-size:0.75rem;">Maksimal 3 MB (PDF/JPG)</small>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-3 border-top">
                            <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-light fw-semibold">
                                <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
                            </a>
                            <button type="submit" class="btn btn-primary-acai px-4 py-2">
                                <i class="bi bi-save me-1"></i> Simpan Data & Berkas Pendaftaran
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
