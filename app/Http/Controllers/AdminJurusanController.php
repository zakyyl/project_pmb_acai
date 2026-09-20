<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class AdminJurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::withCount('pendaftaran')->get();
        return view('admin.jurusan_index', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jenis_jurusan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        Jurusan::create([
            'jenis_jurusan' => $request->jenis_jurusan,
            'deskripsi' => $request->deskripsi,
            'jumlah_pendaftar' => 0,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Program Studi / Jurusan berhasil ditambahkan!');
    }

    public function update(Request $request, $id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $request->validate([
            'jenis_jurusan' => ['required', 'string', 'max:255'],
            'deskripsi' => ['nullable', 'string'],
        ]);

        $jurusan->update([
            'jenis_jurusan' => $request->jenis_jurusan,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->route('admin.jurusan.index')->with('success', 'Data Program Studi berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();

        return redirect()->route('admin.jurusan.index')->with('success', 'Program Studi berhasil dihapus.');
    }
}
