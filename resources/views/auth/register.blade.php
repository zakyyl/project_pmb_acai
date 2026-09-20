@extends('layouts.app')

@section('title', 'Daftar Akun Baru - PMB ACAI')

@section('content')
<div class="container py-5 my-md-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white text-center p-4">
                    <div class="bg-white text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:50px;height:50px;">
                        <i class="bi bi-pencil-square fs-3"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Registrasi Akun Calon Mahasiswa</h4>
                    <p class="small text-white-50 mb-0">Mulai perjalanan studi akademik Anda di ACAI</p>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    <form action="{{ route('register.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="name" class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-person text-muted"></i></span>
                                <input type="text" name="name" id="name" class="form-control border-start-0 @error('name') is-invalid @enderror" value="{{ old('name') }}" placeholder="Contoh: Budi Pratama" required autofocus>
                            </div>
                            @error('name')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Alamat Email Aktif</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="email@domain.com" required>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control border-start-0 @error('password') is-invalid @enderror" placeholder="Minimal 6 karakter" required>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label fw-semibold">Konfirmasi Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock-fill text-muted"></i></span>
                                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control border-start-0" placeholder="Ulangi kata sandi" required>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-acai w-100 py-2">
                            <i class="bi bi-check2-circle me-1"></i> Buat Akun & Lanjut Pendaftaran
                        </button>
                    </form>
                </div>

                <div class="card-footer bg-light p-3 text-center border-0">
                    <small class="text-muted">
                        Sudah pernah mendaftar? 
                        <a href="{{ route('login') }}" class="fw-bold text-primary text-decoration-none">Masuk ke Akun</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
