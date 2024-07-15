<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'singkatan',
        'name',
        'foto',
        'role',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'cabang', 'singkatan');
    }

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'id_juri', 'id');
    }

    public function vokal()
    {
        return $this->hasMany(Nilaivokal::class, 'id_juri', 'id');
    }

    public function sinopsis()
    {
        return $this->hasMany(Sinopsis::class, 'id_juri', 'id');
    }
}
