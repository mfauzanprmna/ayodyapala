<?php

namespace App\Http\Controllers;

use App\Exports\VokalExport;
use App\Models\Nilaivokal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NilaivokalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nilaivokals = Nilaivokal::all();

        return view('nilai.vokal.index', compact('nilaivokals'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juris = User::all()->where('role', 'juri');

        return view('nilai.vokal.create', compact('juris'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $juris = User::all()->where('role', 'juri');
        $data = $request->validate([
            'no_induk' => 'required',
            'semester' => 'required',
            // 'lagu' => 'required',
        ]);
        foreach ($juris as $key => $value) {
            $valudateData = $request->validate([
                'penampilan' . $key  => 'required',
                'teknik' . $key => 'required',
            ]);
        }

        if (Auth::user()->role == 'juri') {
            $data = $request->validate([
                'penampilan' => 'required',
                'teknik' => 'required',
            ]);
            $data['id_juri'] = Auth::user()->id;
            $nilai = Nilaivokal::create($data);
        } elseif (Auth::user()->role == 'admin') {
            foreach ($juris as $key => $juri) {
                $nilai = Nilaivokal::create([
                    'no_induk' => $request->no_induk,
                    'id_juri' => $juri->id,
                    'semester' => $request->semester,
                    'lagu' => 'Tes',
                    'penampilan' => request('penampilan' . $key),
                    'teknik' => request('teknik' . $key),
                ]);
            }
        }

        if ($nilai) {
            //redirect dengan pesan sukses
            return redirect()->route('vokal.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vokal.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function show(Nilaivokal $nilai)
    {
        return view('nilai.vokal.edit', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilaivokal $vokal)
    {
        return view('nilai.vokal.edit', compact('vokal'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilaivokal $vokal)
    {
        $this->validate($request, [
            // 'no_induk'     => 'required',
            // 'nama_siswa'     => 'required',
            'penampilan'     => 'required',
            'teknik'     => 'required',
        ]);

        $edit = $vokal->update([
            // 'no_induk'          => $request->no_induk,
            // 'nama_siswa'        => $request->nama_siswa,
            'penampilan'        => $request->penampilan,
            'teknik'            => $request->teknik,
        ]);

        if ($edit) {
            //redirect dengan pesan sukses
            return redirect()->route('vokal.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vokal.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilaivokal  $nilaivokal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilaivokal $vokal)
    {
        $delete = $vokal->delete();

        if ($delete) {
            //redirect dengan pesan sukses
            return redirect()->route('vokal.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('vokal.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    function export()
    {
        return Excel::download(new VokalExport(), 'nilai_vokal.xlsx');
    }
}
