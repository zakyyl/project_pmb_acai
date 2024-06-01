<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Models{
/**
 * App\Models\Jurusan
 *
 * @property int $id
 * @property string $jenis_jurusan
 * @property string $deskripsi
 * @property string $jumlah_pendaftar
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Pendaftaran> $pendaftaran
 * @property-read int|null $pendaftaran_count
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereDeskripsi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereJenisJurusan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereJumlahPendaftar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jurusan whereUpdatedAt($value)
 */
	class Jurusan extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Mahasiswa
 *
 * @property int $id
 * @property int $user_id
 * @property string $nama
 * @property string $jenkel
 * @property string $tanggal_lahir
 * @property string $asal_sma
 * @property string $tahun_lulus
 * @property string|null $pas_foto
 * @property string|null $ijasah
 * @property string|null $ktp
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Pendaftaran|null $pendaftaran
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa query()
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereAsalSma($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereIjasah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereJenkel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa wherePasFoto($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereTahunLulus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Mahasiswa whereUserId($value)
 */
	class Mahasiswa extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\Pendaftaran
 *
 * @property int $id
 * @property int $mahasiswa_id
 * @property int|null $jurusan_id
 * @property string $status_admin
 * @property string $status_ujian
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Jurusan|null $jurusan
 * @property-read \App\Models\Mahasiswa $mahasiswa
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereJurusanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereMahasiswaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereStatusAdmin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereStatusUjian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pendaftaran whereUpdatedAt($value)
 */
	class Pendaftaran extends \Eloquent {}
}

namespace App\Models{
/**
 * App\Models\User
 *
 * @property int $id
 * @property string $name
 * @property string $role
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property mixed $password
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Mahasiswa> $mahasiswa
 * @property-read int|null $mahasiswa_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection<int, \Illuminate\Notifications\DatabaseNotification> $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \Laravel\Sanctum\PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRole($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

