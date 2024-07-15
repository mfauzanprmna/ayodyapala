<?php

namespace App\Http\Controllers;

use App\Models\Tarian;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\TarianImport;

class TarianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tarians = Tarian::all();
        return view('tarian.index', compact('tarians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tarian.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'daerah'     => 'required',
        ]);


        $tarian = Tarian::create([
            'nama'     => $request->nama,
            'daerah'     => $request->daerah,
        ]);

        if ($tarian) {
            //redirect dengan pesan sukses
            return redirect()->route('tarian.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('tarian.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tarian  $tarian
     * @return \Illuminate\Http\Response
     */
    public function show(Tarian $tarian)
    {
        return view('tarian.edit', compact('tarian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tarian  $tarian
     * @return \Illuminate\Http\Response
     */
    public function edit(Tarian $tarian)
    {
        return view('tarian.edit', compact('tarian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tarian  $tarian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarian $tarian)
    {
        $this->validate($request, [
            'nama'     => 'required',
            'daerah'     => 'required',
        ]);

        $edit = $tarian->update([
            'nama'     => $request->nama,
            'daerah'     => $request->daerah,
        ]);

        if ($edit) {
            //redirect dengan pesan sukses
            return redirect()->route('tarian.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('tarian.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tarian  $tarian
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarian $tarian)
    {
        $delete = $tarian->delete();
        if ($delete) {
            //redirect dengan pesan sukses
            return redirect()->route('tarian.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('tarian.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    public function fileImport(Request $request)
    {
        Excel::import(new TarianImport, $request->file('file')->store('temp'));
        return back();
    }
}
