<?php

namespace App\Exports;

use App\Models\Nilai;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class NilaiExport implements FromView
{
    public function view(): View
    {
        return view('nilai.tari.table', [
            'nilais' => Nilai::select('no_induk', 'id_juri', 'tari_id', 'semester', 'wirama', 'wirasa', 'wiraga')->get()
        ]);
    }
}
