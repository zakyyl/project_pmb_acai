<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class AdminMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Mahasiswa::with(['pendaftaran.jurusan', 'user']);

        if ($request->filled('q')) {
            $keyword = $request->q;
            $query->where(function ($q) use ($keyword) {
                $q->where('nama', 'like', "%{$keyword}%")
                  ->orWhere('asal_sma', 'like', "%{$keyword}%");
            });
        }

        $data['mahasiswa'] = $query->latest()->get();
        $data['judul'] = 'Data Pendaftar Calon Mahasiswa';
        $data['color_list'] = [
            'Lulus' => 'text-success',
            'Tidak Lulus' => 'text-danger',
            'belum lulus' => 'text-warning',
        ];

        return view('admin.mahasiswa_index', $data);
    }

    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::with(['pendaftaran.jurusan', 'user'])->findOrFail($id);
        return view('admin.mahasiswa_detail', compact('mahasiswa'));
    }

    public function update(Request $request, string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        if ($request->has('status_admin')) {
            $item->status_admin = $request->status_admin;
        }
        if ($request->has('status_ujian')) {
            $item->status_ujian = $request->status_ujian;
        }
        $item->save();

        return redirect()->back()->with('success', 'Status pendaftaran berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('admin.mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}
