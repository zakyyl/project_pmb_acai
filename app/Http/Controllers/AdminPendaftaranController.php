<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminPendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    //Yang tanpa embel embel berarti untuk verif dokumen

    public function index()
    {
        $data['pendaftaran'] = Pendaftaran::all();
        $data['judul'] = 'Verifikasi Dokumen Pendaftar';
        $data['color_list'] = [
            'Lulus' => 'text-success',
            'Tidak Lulus' => 'text-danger',
            'belum lulus' => '',
        ];

        return view('admin.dokumen_index', $data);
    }

    public function verifikasiUjianIndex()
    {
        $data['pendaftaran'] = Pendaftaran::all();
        $data['judul'] = 'Verifikasi Hasil Ujian Pendaftar';
        $data['color_list'] = [
            'Lulus' => 'text-success',
            'Tidak Lulus' => 'text-danger',
            'belum lulus' => '',
        ];

        return view('admin.pendaftaran_index', $data);
    }

   
    public function update(Request $request, string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        $item->status_admin = request('status_admin');
        $item->status_ujian = request('status_ujian');
        $item->save();

        // Redirect back or to another route after updating the status
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    public function updateVerifikasiUjian(Request $request, string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        $item->status_ujian = request('status_ujian');
        $item->save();

        // Redirect back or to another route after updating the status
        return redirect()->back()->with('success', 'Status updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function laporanAdmin()
    {
        $data['pendaftaran'] = Pendaftaran::where('status_admin', 'Lulus')->orderBy('jurusan_id', 'desc')->get();
        $data['judul'] = 'Daftar Calon Mahasiswa yang Lulus Seleksi Administrasi';
        return view('admin.laporan_administrasi', $data);
    }

    public function laporanUjian()
    {
        $data['pendaftaran'] = Pendaftaran::where('status_ujian', 'Lulus')->orderBy('jurusan_id', 'desc')->get();
        $data['judul'] = 'Daftar Calon Mahasiswa yang Lulus Seleksi Ujian Masuk';
        return view('admin.laporan_ujian', $data);
    }
}
