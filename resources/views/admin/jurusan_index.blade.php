@extends('layouts.admin')

@section('title', 'Kelola Program Studi - PMB ACAI')
@section('page_title', 'Manajemen Program Studi / Jurusan')

@section('content')
<div class="card border-0 rounded-4 shadow-sm bg-white p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h5 class="fw-bold mb-1">Daftar Program Studi</h5>
            <small class="text-muted">Kelola jurusan pilihan yang tersedia bagi calon mahasiswa baru.</small>
        </div>
        <button type="button" class="btn btn-primary btn-sm px-3" data-bs-toggle="modal" data-bs-target="#modalTambahJurusan">
            <i class="bi bi-plus-lg me-1"></i> Tambah Program Studi
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th style="width: 50px;">No</th>
                    <th>Nama Program Studi</th>
                    <th>Deskripsi Singkat</th>
                    <th class="text-center">Jumlah Pendaftar</th>
                    <th class="text-center" style="width: 130px;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($jurusans as $index => $j)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td class="fw-bold text-dark">{{ $j->jenis_jurusan }}</td>
                        <td><small class="text-muted">{{ Str::limit($j->deskripsi ?? 'Belum ada deskripsi', 80) }}</small></td>
                        <td class="text-center">
                            <span class="badge bg-primary-subtle text-primary fw-bold px-3 py-2 rounded-pill">
                                {{ $j->pendaftaran_count }} Pendaftar
                            </span>
                        </td>
                        <td class="text-center">
                            <div class="btn-group btn-group-sm">
                                <button type="button" class="btn btn-outline-secondary" data-bs-toggle="modal" data-bs-target="#editModal{{ $j->id }}" title="Edit Jurusan">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button type="button" class="btn btn-outline-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $j->id }}" title="Hapus Jurusan">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </div>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editModal{{ $j->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered text-start">
                                    <div class="modal-content">
                                        <form action="{{ route('admin.jurusan.update', $j->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="modal-header">
                                                <h6 class="modal-title fw-bold">Edit Program Studi</h6>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Nama Program Studi</label>
                                                    <input type="text" name="jenis_jurusan" class="form-control" value="{{ $j->jenis_jurusan }}" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label fw-semibold">Deskripsi</label>
                                                    <textarea name="deskripsi" class="form-control" rows="3">{{ $j->deskripsi }}</textarea>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
                                                <button type="submit" class="btn btn-primary btn-sm">Simpan Perubahan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <!-- Modal Hapus -->
                            <div class="modal fade" id="deleteModal{{ $j->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered modal-sm text-start">
                                    <div class="modal-content">
                                        <div class="modal-body text-center p-4">
                                            <i class="bi bi-exclamation-triangle text-danger fs-1 mb-2 d-block"></i>
                                            <h6 class="fw-bold mb-2">Hapus Program Studi?</h6>
                                            <p class="small text-muted mb-4">Apakah Anda yakin ingin menghapus <strong>{{ $j->jenis_jurusan }}</strong>?</p>
                                            <form action="{{ route('admin.jurusan.destroy', $j->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <div class="d-flex gap-2">
                                                    <button type="button" class="btn btn-light flex-fill btn-sm" data-bs-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger flex-fill btn-sm">Hapus</button>
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
                        <td colspan="5" class="text-center py-5 text-muted">Belum ada program studi.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<!-- Modal Tambah Jurusan -->
<div class="modal fade" id="modalTambahJurusan" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <form action="{{ route('admin.jurusan.store') }}" method="POST">
                @csrf
                <div class="modal-header">
                    <h6 class="modal-title fw-bold">Tambah Program Studi Baru</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Program Studi <span class="text-danger">*</span></label>
                        <input type="text" name="jenis_jurusan" class="form-control" placeholder="Contoh: S1 Teknik Informatika" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Deskripsi</label>
                        <textarea name="deskripsi" class="form-control" rows="3" placeholder="Uraian singkat keunggulan & fokus prodi"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary btn-sm">Simpan Program Studi</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
