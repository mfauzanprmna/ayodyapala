<?php

namespace App\Http\Controllers;

use App\Models\Layout;
use App\Models\Background;
use Illuminate\Http\Request;
use Mockery\Undefined;

class LayoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $text = Layout::all()->first();
        $layouts = Background::latest()->paginate(10);
        return view('layout.index', compact('layouts', 'text'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout.create');
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
            'background'     => 'required',
            'kelas'     => 'required',
        ]);

        $file = $request->file('background');

        // Mendapatkan Nama File
        $extension = $file->getClientOriginalExtension();
        $name = $request->kelas;
        $nama_file = $name . "." . $extension;

        // Proses Upload File
        $destinationPath = 'background';
        $file->move($destinationPath, $nama_file);
        $filenameSimpan = $destinationPath . '/' . $nama_file;

        $layout = Background::create([
            'image'  => $filenameSimpan,
            'kelas'  => $request->kelas,
        ]);

        if ($layout) {
            //redirect dengan pesan sukses
            return redirect()->route('layout.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('layout.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function serti(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'tempat' => 'required'
        ]);

        $id = Layout::first();
        $update = $id->edit([
            'tanggal' => $request->tanggal,
            'tempat' => $request->tempat,
        ]);

        if ($update) {
            //redirect dengan pesan sukses
            return redirect('/layout#layout')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect('/layout#layout')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function show(Layout $layout)
    {
        return view('nilai.edit', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function edit(Layout $layout)
    {
        return view('layout.edit', compact('layout'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Background $layout)
    {
        $this->validate($request, [
            'background'     => 'required',
            'kelas'     => 'required',
        ]);

        $file = $request->file('background');


        $layout->update([
            'background'                  => $request->background,
            'kelas'                => $request->kelas,
        ]);

        if ($layout) {
            //redirect dengan pesan sukses
            return redirect()->route('layout.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('layout.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Layout  $layout
     * @return \Illuminate\Http\Response
     */
    public function destroy(Background $layout)
    { 
        $layout->siswa->delete();
        $layout->delete();

        if ($layout) {
            //redirect dengan pesan sukses
            return redirect()->route('layout.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('layout.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
