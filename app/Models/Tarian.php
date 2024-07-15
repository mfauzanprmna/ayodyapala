<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tarian extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama','daerah'
     ];

    public function nilai()
    {
        return $this->hasMany(Nilai::class, 'tari_id');
    }
    
}
