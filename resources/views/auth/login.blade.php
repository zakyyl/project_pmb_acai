@extends('layouts.app')

@section('title', 'Masuk - PMB ACAI')

@section('content')
<div class="container py-5 my-md-4">
    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-lg rounded-4 overflow-hidden">
                <div class="card-header bg-primary text-white text-center p-4">
                    <div class="bg-white text-primary rounded-circle d-inline-flex align-items-center justify-content-center mb-2" style="width:50px;height:50px;">
                        <i class="bi bi-person-fill fs-3"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Masuk ke Portal</h4>
                    <p class="small text-white-50 mb-0">Akses akun calon mahasiswa & administrator</p>
                </div>

                <div class="card-body p-4 p-md-5 bg-white">
                    <!-- Quick Demo Helper -->
                    <div class="bg-light p-3 rounded-3 mb-4 border">
                        <small class="fw-bold text-muted d-block mb-2"><i class="bi bi-lightning-charge-fill text-warning me-1"></i> Quick Demo Login:</small>
                        <div class="d-flex gap-2">
                            <button type="button" class="btn btn-outline-primary btn-sm flex-fill" onclick="fillAdmin()">
                                <i class="bi bi-shield-lock me-1"></i> Admin Demo
                            </button>
                            <button type="button" class="btn btn-outline-secondary btn-sm flex-fill" onclick="fillMhs()">
                                <i class="bi bi-person me-1"></i> Calon Mhs Demo
                            </button>
                        </div>
                    </div>

                    <form action="{{ route('login.post') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label fw-semibold">Alamat Email</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-envelope text-muted"></i></span>
                                <input type="email" name="email" id="email" class="form-control border-start-0 @error('email') is-invalid @enderror" value="{{ old('email') }}" placeholder="nama@email.com" required autofocus>
                            </div>
                            @error('email')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label fw-semibold">Kata Sandi</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0"><i class="bi bi-lock text-muted"></i></span>
                                <input type="password" name="password" id="password" class="form-control border-start-0 @error('password') is-invalid @enderror" placeholder="••••••••" required>
                            </div>
                            @error('password')
                                <div class="text-danger small mt-1">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="d-flex justify-content-between align-items-center mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                <label class="form-check-label small text-muted" for="remember">
                                    Ingat saya
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary-acai w-100 py-2">
                            <i class="bi bi-box-arrow-in-right me-1"></i> Masuk Sekarang
                        </button>
                    </form>
                </div>

                <div class="card-footer bg-light p-3 text-center border-0">
                    <small class="text-muted">
                        Belum memiliki akun pendaftaran? 
                        <a href="{{ route('register') }}" class="fw-bold text-primary text-decoration-none">Daftar Akun Baru</a>
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function fillAdmin() {
        document.getElementById('email').value = 'admin@acai.ac.id';
        document.getElementById('password').value = 'password123';
    }
    function fillMhs() {
        document.getElementById('email').value = 'calon@acai.ac.id';
        document.getElementById('password').value = 'password123';
    }
</script>
@endpush
@endsection
