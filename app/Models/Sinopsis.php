<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sinopsis extends Model
{
    use HasFactory;

    protected $table = 'sinopses';

    protected $fillable = [
        'no_induk','id_juri','semester','nilai'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'no_induk', 'no_induk');
    }

    public function juri()
    {
        return $this->belongsTo(User::class, 'id_juri', 'id');
    }
}
