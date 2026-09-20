<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'PMB ACAI - Penerimaan Mahasiswa Baru')</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">
    
    <style>
        :root {
            --primary: #1e40af;
            --primary-dark: #1e3a8a;
            --primary-light: #3b82f6;
            --secondary: #0ea5e9;
            --accent: #f59e0b;
            --dark-bg: #0f172a;
            --card-bg: #ffffff;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            color: var(--text-main);
            background-color: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar-acai {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.03);
            padding: 0.75rem 0;
            position: sticky;
            top: 0;
            z-index: 1030;
        }

        .brand-logo {
            font-weight: 800;
            font-size: 1.35rem;
            color: #0f1e36;
            letter-spacing: -0.4px;
            display: inline-flex;
            align-items: center;
            gap: 10px;
            text-decoration: none;
            white-space: nowrap;
        }

        .brand-badge {
            background: #0066ff;
            color: #ffffff;
            font-size: 0.72rem;
            padding: 4px 10px;
            border-radius: 20px;
            font-weight: 700;
            letter-spacing: 0.2px;
        }

        .navbar-acai .navbar-nav {
            gap: 0.5rem;
            align-items: center;
        }

        .navbar-acai .nav-link {
            font-weight: 500;
            font-size: 0.95rem;
            color: #475569;
            padding: 0.5rem 0.9rem !important;
            white-space: nowrap !important;
            transition: color 0.2s ease;
            position: relative;
        }

        .navbar-acai .nav-link:hover {
            color: #0066ff;
        }

        .navbar-acai .nav-link.active {
            color: #0066ff !important;
            font-weight: 600;
        }

        .navbar-acai .nav-link.active::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 50%;
            transform: translateX(-50%);
            width: 28px;
            height: 3px;
            background: #0066ff;
            border-radius: 3px;
        }

        .btn-outline-primary-acai {
            border: 1.5px solid #0066ff;
            color: #0066ff;
            background: #ffffff;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.5rem 1.25rem;
            border-radius: 8px;
            white-space: nowrap !important;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-outline-primary-acai:hover {
            background: #f0f7ff;
            color: #0052cc;
            border-color: #0052cc;
        }

        .btn-primary-acai {
            background: #0066ff;
            border: none;
            color: #ffffff;
            font-weight: 600;
            font-size: 0.9rem;
            padding: 0.55rem 1.35rem;
            border-radius: 8px;
            box-shadow: 0 4px 14px rgba(0, 102, 255, 0.25);
            white-space: nowrap !important;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            gap: 6px;
            text-decoration: none;
        }

        .btn-primary-acai:hover {
            background: #0052cc;
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(0, 102, 255, 0.35);
        }

        .footer-acai {
            background: var(--dark-bg);
            color: #94a3b8;
            margin-top: auto;
            border-top: 1px solid #1e293b;
        }

        .footer-acai a {
            color: #cbd5e1;
            text-decoration: none;
            transition: color 0.2s ease;
        }

        .footer-acai a:hover {
            color: #38bdf8;
        }

        .flash-alert {
            position: fixed;
            top: 80px;
            right: 20px;
            z-index: 1050;
            min-width: 320px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.1);
            animation: slideIn 0.3s ease;
        }

        @keyframes slideIn {
            from { transform: translateX(100%); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Top Navigation -->
    <nav class="navbar navbar-expand-lg navbar-acai sticky-top">
        <div class="container-fluid px-4 px-lg-5" style="max-width: 1440px;">
            <a class="navbar-brand brand-logo" href="{{ route('home') }}">
                <i class="bi bi-mortarboard-fill fs-3" style="color: #0066ff;"></i>
                <span>PMB ACAI</span>
                <span class="brand-badge">2026/2027</span>
            </a>
            
            <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav mx-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link {{ request()->routeIs('home') ? 'active' : '' }}" href="{{ route('home') }}">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#prodi">Program Studi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#alur">Alur Pendaftaran</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#jadwal">Jadwal Seleksi</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}#faq">Bantuan & FAQ</a>
                    </li>
                </ul>

                <div class="d-flex align-items-center gap-2 flex-nowrap">
                    @auth
                        @if(Auth::user()->role === 'admin')
                            <a href="{{ route('admin.dashboard') }}" class="btn btn-primary-acai">
                                <i class="bi bi-speedometer2 me-1"></i> Dashboard Admin
                            </a>
                        @else
                            <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-outline-primary-acai">
                                <i class="bi bi-person-circle me-1"></i> Portal Mahasiswa
                            </a>
                        @endif
                        <a href="{{ route('logout') }}" class="btn btn-light text-danger rounded-3 p-2" title="Logout">
                            <i class="bi bi-box-arrow-right"></i>
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary-acai">
                            <i class="bi bi-box-arrow-in-right"></i> Masuk
                        </a>
                        <a href="{{ route('register') }}" class="btn btn-primary-acai">
                            <i class="bi bi-pencil-square"></i> Daftar Sekarang
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    <!-- Flash Messages -->
    @if(session('success'))
        <div class="flash-alert alert alert-success alert-dismissible fade show rounded-3 p-3" role="alert">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-check-circle-fill fs-5 text-success"></i>
                <div>{{ session('success') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="flash-alert alert alert-danger alert-dismissible fade show rounded-3 p-3" role="alert">
            <div class="d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-triangle-fill fs-5 text-danger"></i>
                <div>{{ session('error') }}</div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="footer-acai py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-lg-4">
                    <div class="brand-logo text-white mb-3">
                        <i class="bi bi-mortarboard-fill text-primary fs-2"></i>
                        <span>PMB ACAI</span>
                    </div>
                    <p class="small text-secondary">
                        Sistem Informasi Penerimaan Mahasiswa Baru Akademi & Institut ACAI. Mewujudkan generasi unggul, adaptif terhadap teknologi digital, dan berdaya saing global.
                    </p>
                    <div class="d-flex gap-3 mt-3 fs-5">
                        <a href="#"><i class="bi bi-facebook"></i></a>
                        <a href="#"><i class="bi bi-instagram"></i></a>
                        <a href="#"><i class="bi bi-youtube"></i></a>
                        <a href="#"><i class="bi bi-linkedin"></i></a>
                    </div>
                </div>
                <div class="col-lg-2 col-6">
                    <h6 class="text-white fw-bold mb-3">Navigasi</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('home') }}">Beranda</a></li>
                        <li><a href="{{ route('home') }}#prodi">Program Studi</a></li>
                        <li><a href="{{ route('home') }}#alur">Alur Seleksi</a></li>
                        <li><a href="{{ route('home') }}#jadwal">Jadwal PMB</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-6">
                    <h6 class="text-white fw-bold mb-3">Layanan Mahasiswa</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2">
                        <li><a href="{{ route('register') }}">Registrasi Akun Baru</a></li>
                        <li><a href="{{ route('login') }}">Login Portal Calon Mahasiswa</a></li>
                        <li><a href="{{ route('home') }}#faq">Pusat Bantuan & FAQ</a></li>
                        <li><a href="#">Cek Kelulusan Seleksi</a></li>
                    </ul>
                </div>
                <div class="col-lg-3">
                    <h6 class="text-white fw-bold mb-3">Sekretariat PMB</h6>
                    <ul class="list-unstyled small d-flex flex-column gap-2 text-secondary">
                        <li><i class="bi bi-geo-alt me-2 text-primary"></i> Gedung Rektorat Kampus ACAI, Jl. Kampus Merdeka No. 45</li>
                        <li><i class="bi bi-telephone me-2 text-primary"></i> (021) 8876-5432 / WA: 0812-3456-7890</li>
                        <li><i class="bi bi-envelope me-2 text-primary"></i> pmb@acai.ac.id</li>
                    </ul>
                </div>
            </div>
            <hr class="border-secondary my-4">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center small text-secondary">
                <div>&copy; {{ date('Y') }} Panitia PMB ACAI. Seluruh Hak Cipta Dilindungi.</div>
                <div>Dikembangkan dengan standar arsitektur modern & terpercaya.</div>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Auto dismiss alerts after 5 seconds
        setTimeout(() => {
            document.querySelectorAll('.flash-alert').forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000);
    </script>
    @stack('scripts')
</body>
</html>
