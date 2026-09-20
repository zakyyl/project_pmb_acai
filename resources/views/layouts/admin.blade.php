<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Panel - PMB ACAI')</title>

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        :root {
            --sidebar-width: 260px;
            --primary: #1e40af;
            --primary-dark: #0f172a;
            --sidebar-bg: #0f172a;
            --content-bg: #f8fafc;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--content-bg);
            color: #1e293b;
            min-height: 100vh;
            overflow-x: hidden;
        }

        .admin-sidebar {
            width: var(--sidebar-width);
            background: var(--sidebar-bg);
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            z-index: 1000;
            transition: all 0.3s ease;
            overflow-y: auto;
            border-right: 1px solid #1e293b;
        }

        .admin-sidebar .brand {
            padding: 1.5rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 12px;
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }

        .admin-sidebar .nav-link {
            color: #94a3b8;
            padding: 0.75rem 1.25rem;
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 0.9rem;
            font-weight: 500;
            transition: all 0.2s ease;
            border-radius: 8px;
            margin: 2px 10px;
        }

        .admin-sidebar .nav-link:hover {
            color: #ffffff;
            background: rgba(255,255,255,0.06);
        }

        .admin-sidebar .nav-link.active {
            color: #ffffff;
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            box-shadow: 0 4px 12px rgba(37,99,235,0.3);
        }

        .admin-sidebar .section-title {
            font-size: 0.7rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            color: #64748b;
            font-weight: 700;
            padding: 1.25rem 1.25rem 0.5rem;
        }

        .admin-main {
            margin-left: var(--sidebar-width);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            transition: all 0.3s ease;
        }

        .admin-topbar {
            background: #ffffff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0.9rem 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            position: sticky;
            top: 0;
            z-index: 999;
        }

        .admin-content {
            padding: 2rem 1.5rem;
            flex-grow: 1;
        }

        .card-stat {
            border: none;
            border-radius: 12px;
            background: #ffffff;
            box-shadow: 0 4px 15px rgba(0,0,0,0.03);
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card-stat:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0,0,0,0.06);
        }

        .icon-shape {
            width: 48px;
            height: 48px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.3rem;
        }

        @media (max-width: 991.98px) {
            .admin-sidebar {
                margin-left: calc(-1 * var(--sidebar-width));
            }
            .admin-sidebar.show {
                margin-left: 0;
            }
            .admin-main {
                margin-left: 0;
            }
        }
    </style>
    @stack('styles')
</head>
<body>

    <!-- Sidebar -->
    <aside class="admin-sidebar" id="adminSidebar">
        <div class="brand">
            <div class="bg-primary text-white rounded-3 p-2 d-flex align-items-center justify-content-center" style="width:38px;height:38px;">
                <i class="bi bi-mortarboard-fill fs-5"></i>
            </div>
            <div>
                <h6 class="text-white mb-0 fw-bold">PMB ACAI</h6>
                <small class="text-secondary" style="font-size:0.75rem;">Panitia Penerimaan</small>
            </div>
        </div>

        <div class="py-3">
            <div class="section-title">Menu Utama</div>
            <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="bi bi-speedometer2"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('admin.mahasiswa.index') }}" class="nav-link {{ request()->routeIs('admin.mahasiswa.*') ? 'active' : '' }}">
                <i class="bi bi-people-fill"></i>
                <span>Data Mahasiswa</span>
            </a>

            <div class="section-title">Meja Seleksi</div>
            <a href="{{ route('admin.dokumen.index') }}" class="nav-link {{ request()->routeIs('admin.dokumen.*') ? 'active' : '' }}">
                <i class="bi bi-file-earmark-check-fill"></i>
                <span>Verifikasi Dokumen</span>
            </a>
            <a href="{{ route('admin.ujian.index') }}" class="nav-link {{ request()->routeIs('admin.ujian.*') ? 'active' : '' }}">
                <i class="bi bi-pencil-square"></i>
                <span>Verifikasi Hasil Ujian</span>
            </a>

            <div class="section-title">Master & Laporan</div>
            <a href="{{ route('admin.jurusan.index') }}" class="nav-link {{ request()->routeIs('admin.jurusan.*') ? 'active' : '' }}">
                <i class="bi bi-book-half"></i>
                <span>Kelola Jurusan / Prodi</span>
            </a>
            <a href="{{ route('admin.laporan.administrasi') }}" class="nav-link {{ request()->routeIs('admin.laporan.administrasi') ? 'active' : '' }}">
                <i class="bi bi-printer-fill"></i>
                <span>Laporan Administrasi</span>
            </a>
            <a href="{{ route('admin.laporan.ujian') }}" class="nav-link {{ request()->routeIs('admin.laporan.ujian') ? 'active' : '' }}">
                <i class="bi bi-award-fill"></i>
                <span>Laporan Ujian Masuk</span>
            </a>

            <div class="section-title">Akses Cepat</div>
            <a href="{{ route('home') }}" target="_blank" class="nav-link">
                <i class="bi bi-box-arrow-up-right"></i>
                <span>Lihat Web Publik</span>
            </a>
            <a href="{{ route('logout') }}" class="nav-link text-danger">
                <i class="bi bi-box-arrow-left"></i>
                <span>Keluar (Logout)</span>
            </a>
        </div>
    </aside>

    <!-- Main Wrapper -->
    <div class="admin-main">
        <!-- Topbar -->
        <header class="admin-topbar">
            <div class="d-flex align-items-center gap-3">
                <button class="btn btn-light d-lg-none" type="button" id="sidebarToggle">
                    <i class="bi bi-list fs-5"></i>
                </button>
                <h5 class="mb-0 fw-bold text-dark">@yield('page_title', 'Dashboard Panel')</h5>
            </div>

            <div class="d-flex align-items-center gap-3">
                <div class="d-flex align-items-center gap-2">
                    <div class="bg-primary-subtle text-primary rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width:36px;height:36px;">
                        A
                    </div>
                    <div class="d-none d-sm-block text-end">
                        <div class="fw-semibold small text-dark">{{ Auth::user()->name }}</div>
                        <div class="badge bg-primary-subtle text-primary text-uppercase" style="font-size:0.65rem;">Administrator</div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content Body -->
        <div class="admin-content">
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm border-0" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-check-circle-fill text-success fs-5"></i>
                        <div>{{ session('success') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show rounded-3 p-3 mb-4 shadow-sm border-0" role="alert">
                    <div class="d-flex align-items-center gap-2">
                        <i class="bi bi-exclamation-triangle-fill text-danger fs-5"></i>
                        <div>{{ session('error') }}</div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @yield('content')
        </div>

        <footer class="py-3 px-4 bg-white border-top text-center text-muted small mt-auto">
            &copy; {{ date('Y') }} Panitia PMB ACAI &bull; Panel Administrasi Terpadu
        </footer>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        const sidebarToggle = document.getElementById('sidebarToggle');
        const adminSidebar = document.getElementById('adminSidebar');
        if (sidebarToggle) {
            sidebarToggle.addEventListener('click', () => {
                adminSidebar.classList.toggle('show');
            });
        }
    </script>
    @stack('scripts')
</body>
</html>
