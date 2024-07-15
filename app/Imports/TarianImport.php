<?php

namespace App\Imports;

use App\Models\Tarian;
use Maatwebsite\Excel\Concerns\ToModel;

class TarianImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Tarian([
           'nama' => $row[0],
           'daerah' => $row[1],
        ]);
    }
}
