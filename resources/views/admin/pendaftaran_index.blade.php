@extends('layouts.admin')

@section('title', $judul ?? 'Verifikasi Hasil Ujian')
@section('page_title', $judul ?? 'Verifikasi Hasil Ujian Masuk')

@section('content')
<div class="card border-0 rounded-4 shadow-sm bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">{{ $judul }}</h5>
            <small class="text-muted">Tentukan hasil kelulusan Computer Based Test (CBT) / Ujian Masuk calon mahasiswa.</small>
        </div>
        <a href="{{ route('admin.laporan.ujian') }}" class="btn btn-outline-secondary btn-sm" target="_blank">
            <i class="bi bi-printer me-1"></i> Cetak Laporan Lulus Ujian
        </a>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Calon Mahasiswa</th>
                    <th>Asal Sekolah</th>
                    <th>Program Studi</th>
                    <th>Status Administrasi</th>
                    <th>Status Ujian Saat Ini</th>
                    <th style="width: 250px;">Ubah Status Kelulusan Ujian</th>
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
                            <small class="text-muted">{{ $m->user->email ?? '-' }}</small>
                        </td>
                        <td>{{ $m->asal_sma ?? '-' }}</td>
                        <td>
                            <span class="badge bg-light text-primary border">
                                {{ $item->jurusan->jenis_jurusan ?? '-' }}
                            </span>
                        </td>
                        <td>
                            @if($item->status_admin === 'Lulus')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Lulus Berkas</span>
                            @elseif($item->status_admin === 'Tidak Lulus')
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Tidak Lulus</span>
                            @else
                                <span class="badge bg-warning text-dark"><i class="bi bi-clock me-1"></i>Belum Verif</span>
                            @endif
                        </td>
                        <td>
                            @if($item->status_ujian === 'Lulus')
                                <span class="badge bg-success"><i class="bi bi-award me-1"></i>Lulus Ujian</span>
                            @elseif($item->status_ujian === 'Tidak Lulus')
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Tidak Lulus</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-dash-circle me-1"></i>Belum Ujian</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('admin.ujian.update', $item->id) }}" method="POST" class="d-flex gap-2 align-items-center">
                                @csrf
                                @method('PUT')
                                <select name="status_ujian" class="form-select form-select-sm" required>
                                    <option value="belum lulus" {{ $item->status_ujian === 'belum lulus' ? 'selected' : '' }}>Belum Lulus / Ujian</option>
                                    <option value="Lulus" {{ $item->status_ujian === 'Lulus' ? 'selected' : '' }}>Lulus Seleksi</option>
                                    <option value="Tidak Lulus" {{ $item->status_ujian === 'Tidak Lulus' ? 'selected' : '' }}>Tidak Lulus</option>
                                </select>
                                <button type="submit" class="btn btn-primary btn-sm px-3" title="Simpan Status Ujian">
                                    <i class="bi bi-check-lg"></i>
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2 text-muted"></i>
                            Belum ada pendaftar untuk verifikasi ujian.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
