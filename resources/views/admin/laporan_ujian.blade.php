<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $judul }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
            color: #0f172a;
            padding: 30px 0;
        }

        .report-wrapper {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.05);
            border: 1px solid #e2e8f0;
        }

        .header-kop {
            display: flex;
            align-items: center;
            gap: 20px;
            border-bottom: 3px double #000;
            padding-bottom: 15px;
            margin-bottom: 25px;
        }

        .logo-box {
            width: 70px;
            height: 70px;
            background: #1e40af;
            color: #ffffff;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 2.2rem;
            flex-shrink: 0;
        }

        @media print {
            body {
                background: #ffffff;
                padding: 0;
            }
            .report-wrapper {
                box-shadow: none;
                border: none;
                max-width: 100%;
                padding: 10px;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body>

    <div class="container text-center mb-4 no-print" style="max-width: 900px;">
        <div class="d-flex justify-content-between align-items-center bg-white p-3 rounded-4 shadow-sm border">
            <a href="{{ route('admin.ujian.index') }}" class="btn btn-outline-secondary fw-semibold btn-sm">
                <i class="bi bi-arrow-left me-1"></i> Kembali ke Verifikasi Ujian
            </a>
            <button onclick="window.print()" class="btn btn-primary fw-bold btn-sm px-4">
                <i class="bi bi-printer-fill me-2"></i> Cetak Laporan (Print)
            </button>
        </div>
    </div>

    <div class="report-wrapper">
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
            <h5 class="fw-bold text-uppercase text-decoration-underline mb-1">{{ $judul }}</h5>
            <small class="text-muted">TAHUN AKADEMIK 2026/2027</small>
        </div>

        <div class="table-responsive mb-4">
            <table class="table table-bordered table-sm align-middle">
                <thead class="table-light text-center">
                    <tr>
                        <th style="width: 40px;">No</th>
                        <th>Nomor Peserta</th>
                        <th>Nama Calon Mahasiswa</th>
                        <th>Jenis Kelamin</th>
                        <th>Asal Sekolah</th>
                        <th>Program Studi Diterima</th>
                        <th>Status Akhir</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pendaftaran as $idx => $p)
                        @php $m = $p->mahasiswa; @endphp
                        <tr>
                            <td class="text-center">{{ $idx + 1 }}</td>
                            <td class="text-center font-monospace">ACAI-{{ date('Y', strtotime($p->created_at)) }}-{{ str_pad($m->id ?? 0, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="fw-semibold">{{ $m->nama ?? '-' }}</td>
                            <td class="text-center">{{ ($m->jenkel ?? '') === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                            <td>{{ $m->asal_sma ?? '-' }}</td>
                            <td class="fw-bold text-primary">{{ $p->jurusan->jenis_jurusan ?? '-' }}</td>
                            <td class="text-center"><span class="badge bg-success">LULUS SELEKSI</span></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4 text-muted">Belum ada calon mahasiswa yang dinyatakan lulus ujian masuk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="row pt-4">
            <div class="col-7">
                <div class="p-3 bg-light rounded-3 small">
                    <strong>Catatan Registrasi:</strong>
                    <ul class="ps-3 mb-0 mt-1">
                        <li>Peserta yang lulus wajib melakukan daftar ulang paling lambat 14 hari kerja.</li>
                        <li>Membawa bukti kartu ujian dan berkas fisik asli.</li>
                    </ul>
                </div>
            </div>
            <div class="col-5 text-center small">
                <div>Ditetapkan di Kota Pendidikan,</div>
                <div>Pada tanggal: {{ date('d F Y') }}</div>
                <div class="fw-bold mt-2">Ketua Panitia PMB ACAI,</div>
                <div style="height: 70px;"></div>
                <div class="fw-bold text-decoration-underline">Prof. Dr. Ir. H. ACAI, M.Kom.</div>
                <div class="text-muted" style="font-size:0.75rem;">NIP. 19850101 201012 1 001</div>
            </div>
        </div>
    </div>

</body>
</html>
