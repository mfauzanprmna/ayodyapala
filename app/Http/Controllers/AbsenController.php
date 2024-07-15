<?php

namespace App\Http\Controllers;

use App\Models\Absen;
use Illuminate\Http\Request;
use Carbon\Carbon;

class AbsenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $absens = Absen::latest()->paginate(10);

        return view('absen.index', compact('absens'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('absen.create');
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
            'siswa_id' => 'required',
            'absen' => 'required',
        ]);

        
        $absen = Absen::create([
            'siswa_id' => $request->siswa_id,
            'absen' => $request->absen,
            'keterangan' => $request->keterangan,
            'hari' => Carbon::now()->isoFormat('dddd'),
            'tanggal' => Carbon::now()->isoFormat('D'),
            'bulan' => Carbon::now()->isoFormat('MMMM'),
            'tahun' => Carbon::now()->isoFormat('YYYY'),
        ]);

        if($absen){
            //redirect dengan pesan sukses
            return redirect()->route('absen.index')->with(['success' => 'Data Berhasil Diupdate!']);
        }else{
            //redirect dengan pesan error
            return redirect()->route('absen.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function show(Absen $absen)
    {
        

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function edit(Absen $absen)
    {
        return view('absen.edit', compact('absen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Absen $absen)
    {
        $validate = $request->validate([
            'siswa_id' => 'required'
        ]);

        if($request->absen == 'izin'){
            $validate = $request->validate([
                'keterangan' => 'required'
            ]);
        }

        $validate['hari'] = Carbon::now()->isoFormat('dddd');
        $validate['tanggal'] = Carbon::now()->isoFormat('D');
        $validate['bulan'] = Carbon::now()->isoFormat('MM');
        $validate['tahun'] = Carbon::now()->isoFormat('YYYY');

        Absen::update($validate);

        return redirect('/admin/absen');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Absen  $absen
     * @return \Illuminate\Http\Response
     */
    public function destroy($absen)
    {
        {
            $absen = Absen::findOrFail($absen);
            $absen->delete();
          
            if($absen){
               //redirect dengan pesan sukses
               return redirect()->route('absen.index')->with(['success' => 'Data Berhasil Dihapus!']);
            }else{
              //redirect dengan pesan error
              return redirect()->route('absen.index')->with(['error' => 'Data Gagal Dihapus!']);
            }
    }

}}
