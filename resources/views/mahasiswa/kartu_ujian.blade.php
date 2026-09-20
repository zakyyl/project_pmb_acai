<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Peserta Ujian Masuk - {{ $mahasiswa->nama }}</title>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f1f5f9;
            color: #1e293b;
            padding: 30px 0;
        }

        .ticket-wrapper {
            max-width: 800px;
            margin: auto;
            background: #ffffff;
            border: 2px solid #0f172a;
            border-radius: 8px;
            padding: 35px 40px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.08);
            position: relative;
        }

        .header-kop {
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 3px double #0f172a;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .logo-box {
            width: 70px;
            height: 70px;
            background: #1e40af;
            color: #ffffff;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            flex-shrink: 0;
        }

        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%) rotate(-30deg);
            font-size: 5rem;
            font-weight: 900;
            color: rgba(30, 64, 175, 0.04);
            pointer-events: none;
            user-select: none;
            white-space: nowrap;
            letter-spacing: 5px;
        }

        .photo-box {
            width: 140px;
            height: 180px;
            border: 2px dashed #94a3b8;
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: #f8fafc;
        }

        .photo-box img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .barcode-box {
            background: #0f172a;
            color: #ffffff;
            padding: 6px 16px;
            border-radius: 6px;
            font-family: monospace;
            font-size: 1.1rem;
            letter-spacing: 2px;
            display: inline-block;
            font-weight: bold;
        }

        @media print {
            body {
                background: #ffffff;
                padding: 0;
            }
            .ticket-wrapper {
                box-shadow: none;
                border: 2px solid #000;
                margin: 0;
                max-width: 100%;
                padding: 20px;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <!-- Floating Action Buttons -->
    <div class="container text-center mb-4 no-print" style="max-width: 800px;">
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-4 shadow-sm border">
            <a href="{{ route('mahasiswa.dashboard') }}" class="btn btn-outline-secondary fw-semibold">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Dashboard
            </a>
            <button onclick="window.print()" class="btn btn-primary fw-bold px-4">
                <i class="bi bi-printer-fill me-2"></i> Cetak Kartu Peserta (Print)
            </button>
        </div>
    </div>

    <!-- Printable Card Container -->
    <div class="ticket-wrapper">
        <div class="watermark">PMB ACAI 2026</div>

        <!-- Kop Surat Resmi -->
        <div class="header-kop">
            <div class="logo-box">
                <i class="bi bi-mortarboard-fill"></i>
            </div>
            <div class="flex-grow-1 text-center">
                <h6 class="text-uppercase tracking-wide mb-0 text-muted fw-bold" style="font-size:0.8rem; letter-spacing:1px;">PANITIA PENERIMAAN MAHASISWA BARU (PMB)</h6>
                <h3 class="fw-bold mb-0 text-dark">INSTITUT & AKADEMI ACAI</h3>
                <small class="text-secondary d-block" style="font-size:0.8rem;">
                    Jl. Kampus Merdeka No. 45, Kota Pendidikan &bull; Telp: (021) 8876-5432 &bull; Website: www.acai.ac.id
                </small>
            </div>
        </div>

        <div class="text-center mb-4">
            <h5 class="fw-bold text-uppercase text-decoration-underline mb-1">KARTU TANDA PESERTA UJIAN SELEKSI</h5>
            <small class="text-muted">TAHUN AKADEMIK 2026/2027</small>
        </div>

        <div class="row g-4 align-items-start mb-4">
            <!-- Foto Peserta -->
            <div class="col-sm-4 text-center">
                <div class="photo-box mx-auto mb-2">
                    @if($mahasiswa->pas_foto)
                        <img src="{{ asset('storage/' . $mahasiswa->pas_foto) }}" alt="Foto {{ $mahasiswa->nama }}">
                    @else
                        <div class="text-muted small">
                            <i class="bi bi-camera fs-2 d-block mb-1"></i>
                            Pas Foto 3x4
                        </div>
                    @endif
                </div>
                <div class="barcode-box mt-2">
                    {{ $nomorPeserta }}
                </div>
            </div>

            <!-- Identitas Lengkap -->
            <div class="col-sm-8">
                <table class="table table-sm table-borderless mb-0">
                    <tbody>
                        <tr>
                            <td class="text-muted" style="width: 160px;">Nomor Peserta</td>
                            <td class="fw-bold text-primary">: {{ $nomorPeserta }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Nama Lengkap</td>
                            <td class="fw-bold text-dark">: {{ strtoupper($mahasiswa->nama) }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Jenis Kelamin</td>
                            <td>: {{ $mahasiswa->jenkel === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Tanggal Lahir</td>
                            <td>: {{ date('d F Y', strtotime($mahasiswa->tanggal_lahir)) }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Asal Sekolah</td>
                            <td>: {{ $mahasiswa->asal_sma }} (Lulus {{ $mahasiswa->tahun_lulus }})</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Program Studi Pilihan</td>
                            <td class="fw-bold text-success">: {{ $mahasiswa->pendaftaran->jurusan->jenis_jurusan ?? '-' }}</td>
                        </tr>
                        <tr>
                            <td class="text-muted">Status Administrasi</td>
                            <td>
                                : <span class="badge bg-success">Lulus Verifikasi Dokumen</span>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Jadwal Ujian Box -->
        <div class="border rounded-3 p-3 bg-light mb-4">
            <h6 class="fw-bold mb-2 text-primary"><i class="bi bi-calendar-event me-2"></i>JADWAL & LOKASI PELAKSANAAN UJIAN</h6>
            <div class="row g-2 small">
                <div class="col-sm-6">
                    <strong>Hari, Tanggal:</strong> Sesuai Jadwal Gelombang Berjalan
                </div>
                <div class="col-sm-6">
                    <strong>Waktu Ujian:</strong> 09.00 - 11.30 WIB (CBT Online)
                </div>
                <div class="col-sm-6">
                    <strong>Materi Ujian:</strong> Tes Potensi Akademik & Bahasa Inggris
                </div>
                <div class="col-sm-6">
                    <strong>Tautan / Ruang:</strong> Laboratorium CBT Kampus ACAI / Portal Ujian
                </div>
            </div>
        </div>

        <!-- Tata Tertib & Tanda Tangan -->
        <div class="row g-4 align-items-end pt-2">
            <div class="col-7">
                <div class="p-3 border rounded-3 small text-secondary" style="font-size:0.75rem; line-height: 1.4;">
                    <strong>Tata Tertib Peserta:</strong>
                    <ol class="ps-3 mb-0 mt-1">
                        <li>Wajib membawa/menunjukkan kartu peserta ini saat ujian.</li>
                        <li>Hadir 15 menit sebelum ujian dimulai.</li>
                        <li>Membawa kartu identitas asli (KTP / Kartu Pelajar).</li>
                    </ol>
                </div>
            </div>
            <div class="col-5 text-center small">
                <div>Kota Pendidikan, {{ date('d F Y') }}</div>
                <div class="fw-bold">Ketua Panitia PMB ACAI,</div>
                <div style="height: 60px; display: flex; align-items: center; justify-content: center;">
                    <span class="badge bg-light text-primary border px-3 py-2 fw-semibold" style="font-size:0.75rem;">
                        <i class="bi bi-patch-check-fill text-primary"></i> VERIFIED BY ACAI
                    </span>
                </div>
                <div class="fw-bold text-decoration-underline">Prof. Dr. Ir. H. ACAI, M.Kom.</div>
                <div class="text-muted" style="font-size:0.75rem;">NIP. 19850101 201012 1 001</div>
            </div>
        </div>
    </div>

</body>
</html>
