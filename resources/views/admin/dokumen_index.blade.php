@extends('layouts.admin')

@section('title', $judul ?? 'Verifikasi Dokumen')
@section('page_title', $judul ?? 'Verifikasi Dokumen Administrasi')

@section('content')
<div class="card border-0 rounded-4 shadow-sm bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">{{ $judul }}</h5>
            <small class="text-muted">Periksa kesesuaian dokumen fisik/scan calon mahasiswa sebelum melangkah ke tahapan ujian.</small>
        </div>
        <a href="{{ route('admin.laporan.administrasi') }}" class="btn btn-outline-secondary btn-sm" target="_blank">
            <i class="bi bi-printer me-1"></i> Cetak Laporan Lulus Administrasi
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Calon Mahasiswa</th>
                    <th>Program Studi</th>
                    <th>Berkas Persyaratan</th>
                    <th>Status Saat Ini</th>
                    <th style="width: 250px;">Ubah Status Administrasi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($pendaftaran as $index => $item)
                    @php
                        $m = $item->mahasiswa;
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="fw-bold text-dark">{{ $m->nama ?? 'Data Mahasiswa Dihapus' }}</div>
                            <small class="text-muted">{{ $m->asal_sma ?? '-' }} (Lulus {{ $m->tahun_lulus ?? '-' }})</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border">
                                {{ $item->jurusan->jenis_jurusan ?? '-' }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2">
                                @if($m && $m->pas_foto)
                                    <a href="{{ asset('storage/' . $m->pas_foto) }}" target="_blank" class="btn btn-xs btn-outline-secondary py-0 px-2 small" title="Lihat Foto">
                                        <i class="bi bi-image me-1"></i>Foto
                                    </a>
                                @else
                                    <span class="text-muted small">-</span>
                                @endif

                                @if($m && $m->ijasah)
                                    <a href="{{ asset('storage/' . $m->ijasah) }}" target="_blank" class="btn btn-xs btn-outline-primary py-0 px-2 small" title="Lihat Ijazah">
                                        <i class="bi bi-file-earmark-pdf me-1"></i>Ijazah
                                    </a>
                                @else
                                    <span class="text-danger small">Ijazah Kosong</span>
                                @endif

                                @if($m && $m->ktp)
                                    <a href="{{ asset('storage/' . $m->ktp) }}" target="_blank" class="btn btn-xs btn-outline-info py-0 px-2 small" title="Lihat KTP">
                                        <i class="bi bi-card-text me-1"></i>KTP
                                    </a>
                                @endif
                            </div>
                        </td>
                        <td>
                            @if($item->status_admin === 'Lulus')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Lulus</span>
                            @elseif($item->status_admin === 'Tidak Lulus')
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Tidak Lulus</span>
                            @else
                                <span class="badge bg-warning text-dark"><i class="bi bi-clock me-1"></i>Belum Diverifikasi</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.pendaftaran.update', $item->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                                @csrf
                                @method('PUT')
                                <select name="status_admin" class="form-select form-select-sm" required>
                                    <option value="belum lulus" {{ $item->status_admin === 'belum lulus' ? 'selected' : '' }}>Belum Lulus</option>
                                    <option value="Lulus" {{ $item->status_admin === 'Lulus' ? 'selected' : '' }}>Lulus</option>
                                    <option value="Tidak Lulus" {{ $item->status_admin === 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm px-3" title="Simpan Status">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center py-5 text-muted">
                            <i class="bi bi-file-earmark-x fs-2 d-block mb-2 text-muted"></i>
                            Belum ada dokumen pendaftaran yang masuk.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
