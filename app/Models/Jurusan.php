<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    use HasFactory;

    protected $table = 'jurusans';

    protected $fillable = [
        'jenis_jurusan',
        'deskripsi',
        'jumlah_pendaftar',
    ];

    public function pendaftaran()
    {
        return $this->hasMany(Pendaftaran::class, 'jurusan_id');
    }
}
