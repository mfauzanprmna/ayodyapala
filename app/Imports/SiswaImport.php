<?php
namespace App\Imports;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;

class SiswaImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Siswa([
            'no_induk' => $row[2],
            'nama_siswa' => $row[1],
            'kelas' => request('kelas'),
            'semester' => $row[3],
            'tanggal_lahir' => $row[4],
            'orang_tua' => $row[5],
            'alamat' => 'depok',
            'cabang' => $row[9],
            'password' => Hash::make('password'),
            'foto' => 'image/default.png',
        ]);
    }
}
