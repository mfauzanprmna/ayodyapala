<?php

namespace App\Http\Controllers;

use App\Exports\SinopsisExport;
use App\Models\Sinopsis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Siswa;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class SinopsisController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $juri = User::all()->where('role', 'juri');
            $sinopsis = Sinopsis::all();
            return view('nilai.sinopsis.index', compact('sinopsis', 'juri'));
        } elseif (Auth::user()->role == 'juri') {
            $sinopsis = Sinopsis::all()->where('id_juri', Auth::user()->id);
            return view('nilai.sinopsis.index', compact('sinopsis'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juris = User::all()->where('role', 'juri');

        return view('nilai.sinopsis.create', compact('juris'));
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
        ]);

        foreach ($juris as $key => $value) {
            $valudateData = $request->validate([
                'nilai' . $key => 'required',
            ]);
        }
        if (Auth::user()->role == 'juri') {
            $data = $request->validate([
                'nilai' => 'required',
            ]);
            $data['id_juri'] = Auth::user()->id;
            $nilai = Sinopsis::create($data);
        } elseif (Auth::user()->role == 'admin') {
            foreach ($juris as $key => $juri) {
                $nilai = Sinopsis::create([
                    'no_induk' => $request->no_induk,
                    'id_juri' => $juri->id,
                    'semester' => $request->semester,
                    'nilai' => request('nilai' . $key),
                ]);
            }
        }

        if ($nilai) {
            //redirect dengan pesan sukses
            return redirect()->route('sinopsis.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('sinopsis.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function show(Sinopsis $sinopsis)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function edit(Sinopsis $sinopsi)
    {
        $juris = User::all()->where('role', 'juri');

        return view('nilai.sinopsis.edit', compact('juris', 'sinopsi'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Sinopsis $sinopsi)
    {
        $this->validate($request, [
            'nilai' => 'required',
        ]);

        //get data nilai by ID
        if (Auth::user()->role == 'juri') {
            $sinopsi->update([
                'nilai' => $request->nilai,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            $sinopsi->update([
                'nilai' => $request->nilai,
            ]);
        }

        if ($sinopsi) {
            //redirect dengan pesan sukses
            return redirect()->route('sinopsis.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('sinopsis.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sinopsis  $sinopsis
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sinopsis = Sinopsis::findOrfail($id);
        $sinopsis->delete();

        if ($sinopsis) {
            //redirect dengan pesan sukses
            return redirect()->route('sinopsis.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('sinopsis.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    function export()
    {
        return Excel::download(new SinopsisExport(), 'nilai_sinopsis.xlsx');
    }
}
