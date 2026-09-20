<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;

class HomeController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        $totalPendaftar = Mahasiswa::count();
        $totalLulus = Pendaftaran::where('status_ujian', 'Lulus')->count();

        return view('welcome', compact('jurusans', 'totalPendaftar', 'totalLulus'));
    }
}
