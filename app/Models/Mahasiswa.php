<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $table = 'mahasiswas';

    protected $fillable = [
        'user_id',
        'nama',
        'jenkel',
        'tanggal_lahir',
        'asal_sma',
        'tahun_lulus',
        'pas_foto',
        'ijasah',
        'ktp',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function pendaftaran()
    {
        return $this->hasOne(Pendaftaran::class, 'mahasiswa_id');
    }
}
