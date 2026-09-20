<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    /**
     * Verifikasi Berkas Administrasi Dokumen
     */
    public function index()
    {
        $data['pendaftaran'] = Pendaftaran::with(['mahasiswa', 'jurusan'])->latest()->get();
        $data['judul'] = 'Verifikasi Dokumen Administrasi Pendaftar';
        $data['color_list'] = [
            'Lulus' => 'text-success',
            'Tidak Lulus' => 'text-danger',
            'belum lulus' => 'text-warning',
        ];

        return view('admin.dokumen_index', $data);
    }

    /**
     * Verifikasi Hasil Ujian Masuk
     */
    public function verifikasiUjianIndex()
    {
        // Hanya yang sudah Lulus Administrasi atau semua pendaftar
        $data['pendaftaran'] = Pendaftaran::with(['mahasiswa', 'jurusan'])->latest()->get();
        $data['judul'] = 'Verifikasi Hasil Seleksi Ujian Masuk';
        $data['color_list'] = [
            'Lulus' => 'text-success',
            'Tidak Lulus' => 'text-danger',
            'belum lulus' => 'text-warning',
        ];

        return view('admin.pendaftaran_index', $data);
    }

    public function update(Request $request, string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        if ($request->filled('status_admin')) {
            $item->status_admin = $request->status_admin;
        }
        if ($request->filled('status_ujian')) {
            $item->status_ujian = $request->status_ujian;
        }
        $item->save();

        return redirect()->back()->with('success', 'Status verifikasi berkas berhasil diperbarui!');
    }

    public function updateVerifikasiUjian(Request $request, string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        if ($request->filled('status_ujian')) {
            $item->status_ujian = $request->status_ujian;
        }
        $item->save();

        return redirect()->back()->with('success', 'Status hasil ujian masuk berhasil diperbarui!');
    }

    public function destroy(string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        $item->delete();

        return redirect()->back()->with('success', 'Data pendaftaran berhasil dihapus.');
    }

    public function laporanAdmin()
    {
        $data['pendaftaran'] = Pendaftaran::with(['mahasiswa', 'jurusan'])
            ->where('status_admin', 'Lulus')
            ->orderBy('jurusan_id', 'asc')
            ->get();
        $data['judul'] = 'Laporan Calon Mahasiswa Lulus Seleksi Administrasi';

        return view('admin.laporan_administrasi', $data);
    }

    public function laporanUjian()
    {
        $data['pendaftaran'] = Pendaftaran::with(['mahasiswa', 'jurusan'])
            ->where('status_ujian', 'Lulus')
            ->orderBy('jurusan_id', 'asc')
            ->get();
        $data['judul'] = 'Laporan Calon Mahasiswa Lulus Ujian Masuk';

        return view('admin.laporan_ujian', $data);
    }
}
