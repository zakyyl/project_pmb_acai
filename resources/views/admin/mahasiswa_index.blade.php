@extends('layouts.admin')

@section('title', $judul ?? 'Data Mahasiswa')
@section('page_title', $judul ?? 'Data Calon Mahasiswa')

@section('content')
<div class="card border-0 rounded-4 shadow-sm bg-white p-4">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
        <div>
            <h5 class="fw-bold mb-1">{{ $judul }}</h5>
            <small class="text-muted">Total: {{ $mahasiswa->count() }} Calon Mahasiswa Terdaftar</small>
        </div>

        <form action="{{ route('admin.mahasiswa.index') }}" method="GET" class="d-flex gap-2" style="max-width: 350px;">
            <input type="text" name="q" class="form-control form-control-sm" placeholder="Cari nama atau asal SMA..." value="{{ request('q') }}">
            <button type="submit" class="btn btn-sm btn-primary"><i class="bi bi-search"></i></button>
            @if(request('q'))
                <a href="{{ route('admin.mahasiswa.index') }}" class="btn btn-sm btn-light border"><i class="bi bi-x"></i></a>
            @endif
        </form>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Calon Mahasiswa</th>
                    <th>Jenis Kelamin</th>
                    <th>Asal Sekolah</th>
                    <th>Program Studi</th>
                    <th>Status Berkas</th>
                    <th>Status Ujian</th>
                    <th class="text-center" style="width: 140px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($mahasiswa as $index => $m)
                    @php
                        $pendaftaran = $m->pendaftaran;
                        $statusAdmin = $pendaftaran ? $pendaftaran->status_admin : 'belum lulus';
                        $statusUjian = $pendaftaran ? $pendaftaran->status_ujian : 'belum lulus';
                    @endphp
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center gap-3">
                                @if($m->pas_foto)
                                    <img src="{{ asset('storage/' . $m->pas_foto) }}" class="rounded-3 object-fit-cover shadow-sm" style="width:40px;height:50px;">
                                @else
                                    <div class="bg-light rounded-3 text-secondary d-flex align-items-center justify-content-center" style="width:40px;height:50px;">
                                        <i class="bi bi-person fs-4"></i>
                                    </div>
                                @endif
                                <div>
                                    <div class="fw-bold text-dark">{{ $m->nama }}</div>
                                    <small class="text-muted">{{ $m->user->email ?? '-' }}</small>
                                </div>
                            </div>
                        </td>
                        <td>{{ $m->jenkel === 'L' ? 'Laki-Laki' : 'Perempuan' }}</td>
                        <td>
                            <div>{{ $m->asal_sma }}</div>
                            <small class="text-muted">Lulus {{ $m->tahun_lulus }}</small>
                        </td>
                        <td>
                            <span class="badge bg-light text-primary border">
                                {{ $pendaftaran->jurusan->jenis_jurusan ?? 'Belum memilih' }}
                            </span>
                        </td>
                        <td>
                            @if($statusAdmin === 'Lulus')
                                <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Lulus</span>
                            @elseif($statusAdmin === 'Tidak Lulus')
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Tidak Lulus</span>
                            @else
                                <span class="badge bg-warning text-dark"><i class="bi bi-clock me-1"></i>Belum Verif</span>
                            @endif
                        </td>
                        <td>
                            @if($statusUjian === 'Lulus')
                                <span class="badge bg-success"><i class="bi bi-award me-1"></i>Lulus</span>
                            @elseif($statusUjian === 'Tidak Lulus')
                                <span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Tidak Lulus</span>
                            @else
                                <span class="badge bg-secondary"><i class="bi bi-dash-circle me-1"></i>Belum Ujian</span>
                            @endif
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.mahasiswa.show', $m->id) }}" class="btn btn-outline-primary" title="Lihat Profil">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <button type="button" class="btn btn-outline-danger" title="Hapus Data" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $m->id }}">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>

                            <!-- Modal Konfirmasi Hapus -->
                            <div class="modal fade" id="deleteModal{{ $m->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm">
                                    <div class="modal-content">
                                        <div class="modal-body text-center p-4">
                                            <i class="bi bi-exclamation-circle text-danger fs-1 mb-2 d-block"></i>
                                            <h6 class="fw-bold mb-2">Hapus Data Mahasiswa?</h6>
                                            <p class="small text-muted mb-4">Seluruh data pendaftaran dan berkas {{ $m->nama }} akan terhapus permanen.</p>
                                            <form action="{{ route('admin.mahasiswa.destroy', $m->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-light flex-fill btn-sm" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger flex-fill btn-sm">Ya, Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center py-5 text-muted">
                            <i class="bi bi-inbox fs-2 d-block mb-2 text-muted"></i>
                            Tidak ada data calon mahasiswa yang ditemukan.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
