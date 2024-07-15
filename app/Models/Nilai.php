<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nilai extends Model
{
    protected $fillable = [
       'no_induk','id_juri','tari_id','semester','wirama','wiraga','wirasa'
    ];

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'no_induk', 'no_induk');
    }

    public function tari()
    {
        return $this->belongsTo(Tarian::class, 'tari_id', 'id');
    }

    public function juri()
    {
        return $this->belongsTo(User::class, 'id_juri', 'id');
    }
}
