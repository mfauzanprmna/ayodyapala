<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Background extends Model
{
    use HasFactory;
    protected $fillable = [
        'image', 'kelas'
    ];

    public function siswa()
    {
        return $this->hasMany(Siswa::class, 'kelas', 'id');
    }
}
