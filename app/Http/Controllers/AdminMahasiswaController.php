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
    public function index()
    {
        $data['mahasiswa'] = Mahasiswa::with('pendaftaran')->get();
        $data['judul'] = 'Data-Data Mahasiswa';
        $data['color_list'] = [
            'Lulus' => 'text-success',
            'Tidak Lulus' => 'text-danger',
            'belum lulus' => '',
        ];

        return view('admin.mahasiswa_index', $data);
    }

    
    public function update(Request $request, string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        $item->status_admin = request('status_admin');
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
}
