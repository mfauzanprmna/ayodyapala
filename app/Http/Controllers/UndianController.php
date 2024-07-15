<?php

namespace App\Http\Controllers;

use App\Models\Undian;
use Illuminate\Http\Request;

class UndianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $undians = Undian::latest()->paginate(10);
        return view('undian.index', compact('undians'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('undian.create');
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
            'nomor'=> 'required',
            'siswa_id'=> 'required',
            'nama'=> 'required',
            'daerah'=> 'required',

        ]);

        $undian = Undian::create([
            'nomor'=> $request->nomor,
            'siswa_id'=> $request->siswa_id,
            'nama'=> $request->nama,
            'daerah'=> $request->daerah,


        ]);

        if ($undian) {
            //redirect dengan pesan sukses
            return redirect()->route('undian.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('undian.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Undian  $undian
     * @return \Illuminate\Http\Response
     */
    public function show(Undian $undian)
    {
        return view('undian.edit', compact('undian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Undian  $undian
     * @return \Illuminate\Http\Response
     */
    public function edit(Undian $undian)
    {
        return view('undian.edit', compact('undian'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Undian  $undian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Undian $undian)
    {
        $this->validate($request, [
            'nomor'=> 'required',
            'siswa_id'=> 'required',
            'nama'=> 'required',
            'daerah'=> 'required'
        ]);
    
        //get data undian by ID
        $undian = Undian::findOrFail($undian->id);
    
    
            $undian->update([
                'nomor'=> $request->nomor,
                'siswa_id'=> $request->siswa_id,
                'nama'=> $request->nama,
                'daerah'=> $request->daerah,
            ]);
    
        
    
        if($undian){
            //redirect dengan pesan sukses
            return redirect()->route('undian.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('undian.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Undian  $undian
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
     $undian = Undian::findOrFail($id);
    $undian->delete();
  
    if($undian){
       //redirect dengan pesan sukses
       return redirect()->route('undian.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }else{
      //redirect dengan pesan error
      return redirect()->route('undian.index')->with(['error' => 'Data Gagal Dihapus!']);
    }
  }
}
