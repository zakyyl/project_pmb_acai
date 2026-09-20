<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class MahasiswaPortalController extends Controller
{
    public function dashboard()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::with('pendaftaran.jurusan')->where('user_id', $user->id)->first();

        return view('mahasiswa.dashboard', compact('user', 'mahasiswa'));
    }

    public function formulir()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::with('pendaftaran')->where('user_id', $user->id)->first();
        $jurusans = Jurusan::all();

        return view('mahasiswa.formulir', compact('user', 'mahasiswa', 'jurusans'));
    }

    public function storeFormulir(Request $request)
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        $rules = [
            'nama' => ['required', 'string', 'max:255'],
            'jenkel' => ['required', 'in:L,P'],
            'tanggal_lahir' => ['required', 'date'],
            'asal_sma' => ['required', 'string', 'max:255'],
            'tahun_lulus' => ['required', 'digits:4'],
            'jurusan_id' => ['required', 'exists:jurusans,id'],
        ];

        // Foto & dokumen hanya wajib jika belum pernah upload sebelumnya
        if (!$mahasiswa || !$mahasiswa->pas_foto) {
            $rules['pas_foto'] = ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        } else {
            $rules['pas_foto'] = ['nullable', 'image', 'mimes:jpeg,png,jpg', 'max:2048'];
        }

        if (!$mahasiswa || !$mahasiswa->ijasah) {
            $rules['ijasah'] = ['required', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'];
        } else {
            $rules['ijasah'] = ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'];
        }

        if (!$mahasiswa || !$mahasiswa->ktp) {
            $rules['ktp'] = ['required', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'];
        } else {
            $rules['ktp'] = ['nullable', 'file', 'mimes:jpeg,png,jpg,pdf', 'max:3072'];
        }

        $validated = $request->validate($rules, [
            'pas_foto.max' => 'Ukuran Pas Foto maksimal 2MB.',
            'ijasah.max' => 'Ukuran file Ijazah maksimal 3MB.',
            'ktp.max' => 'Ukuran file KTP maksimal 3MB.',
            'jurusan_id.required' => 'Silakan pilih program studi / jurusan.',
        ]);

        $dataMahasiswa = [
            'user_id' => $user->id,
            'nama' => $validated['nama'],
            'jenkel' => $validated['jenkel'],
            'tanggal_lahir' => $validated['tanggal_lahir'],
            'asal_sma' => $validated['asal_sma'],
            'tahun_lulus' => $validated['tahun_lulus'],
        ];

        if ($request->hasFile('pas_foto')) {
            if ($mahasiswa && $mahasiswa->pas_foto) {
                Storage::disk('public')->delete($mahasiswa->pas_foto);
            }
            $dataMahasiswa['pas_foto'] = $request->file('pas_foto')->store('uploads/foto', 'public');
        }

        if ($request->hasFile('ijasah')) {
            if ($mahasiswa && $mahasiswa->ijasah) {
                Storage::disk('public')->delete($mahasiswa->ijasah);
            }
            $dataMahasiswa['ijasah'] = $request->file('ijasah')->store('uploads/ijasah', 'public');
        }

        if ($request->hasFile('ktp')) {
            if ($mahasiswa && $mahasiswa->ktp) {
                Storage::disk('public')->delete($mahasiswa->ktp);
            }
            $dataMahasiswa['ktp'] = $request->file('ktp')->store('uploads/ktp', 'public');
        }

        $mhs = Mahasiswa::updateOrCreate(
            ['user_id' => $user->id],
            $dataMahasiswa
        );

        // Update / create pendaftaran
        $pendaftaran = Pendaftaran::where('mahasiswa_id', $mhs->id)->first();
        if ($pendaftaran) {
            $oldJurusanId = $pendaftaran->jurusan_id;
            $pendaftaran->update([
                'jurusan_id' => $validated['jurusan_id'],
            ]);

            if ($oldJurusanId != $validated['jurusan_id']) {
                if ($oldJurusanId) {
                    Jurusan::where('id', $oldJurusanId)->decrement('jumlah_pendaftar');
                }
                Jurusan::where('id', $validated['jurusan_id'])->increment('jumlah_pendaftar');
            }
        } else {
            Pendaftaran::create([
                'mahasiswa_id' => $mhs->id,
                'jurusan_id' => $validated['jurusan_id'],
                'status_admin' => 'belum lulus',
                'status_ujian' => 'belum lulus',
            ]);
            Jurusan::where('id', $validated['jurusan_id'])->increment('jumlah_pendaftar');
        }

        return redirect()->route('mahasiswa.dashboard')->with('success', 'Data pendaftaran dan berkas persyaratan berhasil disimpan!');
    }

    public function kartuUjian()
    {
        $user = Auth::user();
        $mahasiswa = Mahasiswa::with('pendaftaran.jurusan')->where('user_id', $user->id)->first();

        if (!$mahasiswa || !$mahasiswa->pendaftaran) {
            return redirect()->route('mahasiswa.formulir')->with('error', 'Silakan lengkapi formulir pendaftaran terlebih dahulu.');
        }

        $nomorPeserta = 'ACAI-' . date('Y', strtotime($mahasiswa->created_at)) . '-' . str_pad($mahasiswa->id, 4, '0', STR_PAD_LEFT);

        return view('mahasiswa.kartu_ujian', compact('user', 'mahasiswa', 'nomorPeserta'));
    }
}
