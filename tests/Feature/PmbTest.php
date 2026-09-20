<?php

namespace Tests\Feature;

use App\Models\Jurusan;
use App\Models\Mahasiswa;
use App\Models\Pendaftaran;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PmbTest extends TestCase
{
    public function test_landing_page_can_be_accessed(): void
    {
        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('PMB ACAI');
        $response->assertSee('Program Studi');
    }

    public function test_login_page_can_be_accessed(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
        $response->assertSee('Masuk ke Portal');
    }

    public function test_register_page_can_be_accessed(): void
    {
        $response = $this->get('/register');
        $response->assertStatus(200);
        $response->assertSee('Registrasi Akun Calon Mahasiswa');
    }

    public function test_admin_can_access_dashboard_and_reports(): void
    {
        $admin = User::where('email', 'admin@acai.ac.id')->first();
        $this->assertNotNull($admin);

        $response = $this->actingAs($admin)->get('/admin');
        $response->assertStatus(200);
        $response->assertSee('Ringkasan & Statistik PMB ACAI');

        $response = $this->actingAs($admin)->get('/admin/dokumen');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get('/admin/verifikasi-ujian');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get('/admin/laporan-administrasi');
        $response->assertStatus(200);

        $response = $this->actingAs($admin)->get('/admin/laporan-ujian');
        $response->assertStatus(200);
    }

    public function test_mahasiswa_can_access_portal_and_card(): void
    {
        $mhsUser = User::where('email', 'calon@acai.ac.id')->first();
        $this->assertNotNull($mhsUser);

        $response = $this->actingAs($mhsUser)->get('/mahasiswa/dashboard');
        $response->assertStatus(200);
        $response->assertSee('Portal Calon Mahasiswa');

        $response = $this->actingAs($mhsUser)->get('/mahasiswa/formulir');
        $response->assertStatus(200);

        $response = $this->actingAs($mhsUser)->get('/mahasiswa/kartu-ujian');
        $response->assertStatus(200);
        $response->assertSee('KARTU TANDA PESERTA UJIAN SELEKSI');
    }
}
