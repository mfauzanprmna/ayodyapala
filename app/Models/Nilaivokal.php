<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilaivokal extends Model
{
    protected $fillable = [
        'no_induk','id_juri','lagu','semester','penampilan','teknik'
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
