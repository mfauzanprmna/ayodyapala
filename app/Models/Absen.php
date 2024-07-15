<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absen extends Model
{
    use HasFactory;

    protected $fillable = [
        'siswa_id',
        'absen',
        'keterangan',
        'hari',
        'tanggal',
        'bulan',
        'tahun'
    ];
}
