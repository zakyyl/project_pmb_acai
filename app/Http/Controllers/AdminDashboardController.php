<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $totalMahasiswa = Mahasiswa::count();
        $lulusAdmin = Pendaftaran::where('status_admin', 'Lulus')->count();
        $tidakLulusAdmin = Pendaftaran::where('status_admin', 'Tidak Lulus')->count();
        $pendingAdmin = Pendaftaran::where('status_admin', 'belum lulus')->count();

        $lulusUjian = Pendaftaran::where('status_ujian', 'Lulus')->count();
        $tidakLulusUjian = Pendaftaran::where('status_ujian', 'Tidak Lulus')->count();

        $jurusans = Jurusan::withCount('pendaftaran')->get();
        $recentPendaftar = Mahasiswa::with(['pendaftaran.jurusan', 'user'])->latest()->take(5)->get();

        return view('admin.dashboard', compact(
            'totalMahasiswa',
            'lulusAdmin',
            'tidakLulusAdmin',
            'pendingAdmin',
            'lulusUjian',
            'tidakLulusUjian',
            'jurusans',
            'recentPendaftar'
        ));
    }
}
