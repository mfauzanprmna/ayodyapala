<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    
    protected $fillable = [
        'foto',
        'kelas',
        'no_induk',
        'nama_siswa',
        'semester',
        'tanggal_lahir',
        'orang_tua',
        'alamat',
        'cabang',
        'password',
    ];

    public function tari()
    {
        return $this->hasMany(Nilai::class, 'no_induk', 'no_induk');
    }

    public function vokal()
    {
        return $this->hasMany(Nilaivokal::class, 'no_induk', 'no_induk');
    }

    public function sinopsis()
    {
        return $this->hasMany(Sinopsis::class, 'no_induk');
    }

    public function tempat()
    {
        return $this->belongsTo(User::class, 'cabang', 'singkatan');
    }

    public function kelass()
    {
        return $this->belongsTo(Background::class, 'kelas', 'id');
    }
}
