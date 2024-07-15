<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Siswa;
use App\Models\Tarian;
use App\Models\User;
use App\Exports\NilaiExport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::user()->role == 'admin') {
            $juris = User::all()->where('role', 'juri');
            $nilais = Nilai::all();
        } elseif (Auth::user()->role == 'juri') {
            $nilais = Nilai::all()->where('id_juri', Auth::user()->id);
        }

        return view('nilai.tari.index', compact('nilais', 'juris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $juris = User::all()->where('role', 'juri');

        return view('nilai.tari.create', compact('juris'));
    }

    public function browse(Request $request)
    {
        $data = Tarian::orderby('nama', 'asc')->whereRaw("(nama LIKE '%" . $request->get('q') . "%' OR daerah LIKE '%" . $request->get('q') . "%')")
            ->limit(30)
            ->get();
        return response()->json($data);
    }

    public function getSiswa(Request $request)
    {
        $search = $request->search;
        if ($search == '') {
            $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'semester')->limit(5)->get();
        } else {
            $employees = Siswa::orderby('nama_siswa', 'asc')->select('no_induk', 'nama_siswa', 'semester')->where('nama_siswa', 'like', '%' . $search . '%')->limit(5)->get();
        }

        $response = array();
        foreach ($employees as $employee) {
            $response[] = array("id" => $employee->no_induk, "label" => $employee->nama_siswa, "semester" => $employee->semester);
        }

        return response()->json($response);
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
        $this->validate($request, [
            'tari' => 'required',
        ]);
        foreach ($juris as $key => $value) {
            $valudateData = $request->validate([
                'wirama' . $key  => 'required',
                'wiraga' . $key => 'required',
                'wirasa' . $key => 'required',
            ]);
        }

        if (Auth::user()->role == 'juri') {
            $nilai = Nilai::create([
                'no_induk' => $request->induk,
                'id_juri' => Auth::guard('user')->user()->id,
                'tari_id' => $request->tari,
                'semester' => $request->semester,
                'wirama' => $request->wirama,
                'wiraga' => $request->wiraga,
                'wirasa' => $request->wirasa,
            ]);
        } elseif (Auth::user()->role == 'admin') {
            foreach ($juris as $key => $juri) {
                $nilai = Nilai::create([
                    'no_induk' => $request->induk,
                    'id_juri' => $juri->id,
                    'tari_id' => $request->tari,
                    'semester' => $request->semester,
                    'wirama' => request('wirama' . $key),
                    'wiraga' => request('wiraga' . $key),
                    'wirasa' => request('wirasa' . $key),
                ]);
            }
        }

        if ($nilai) {
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function show(Nilai $nilai)
    {
        return view('nilai.tari.edit', compact('nilai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function edit(Nilai $nilai)
    {
        $juris = User::all()->where('role', 'juri');

        return view('nilai.tari.edit', compact('juris', 'nilai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Nilai $nilai)
    {
        $this->validate($request, [
            'wirama' => 'required',
            'wiraga' => 'required',
            'wirasa' => 'required',
        ]);

        if (Auth::user()->role == 'juri') {
            if ($request->tari == '') {
                $edit = $nilai->update([
                    'id_juri' => Auth::guard('user')->user()->id,
                    'wirama' => $request->wirama,
                    'wiraga' => $request->wiraga,
                    'wirasa' => $request->wirasa,
                ]);
            } else {
                $edit = $nilai->update([
                    'id_juri' => Auth::guard('user')->user()->id,
                    'tari_id' => $request->tari,
                    'wirama' => $request->wirama,
                    'wiraga' => $request->wiraga,
                    'wirasa' => $request->wirasa,
                ]);
            }
            
        } elseif (Auth::user()->role == 'admin') {
            if ($request->tari == '') {
                $edit = $nilai->update([
                    'wirama' => $request->wirama,
                    'wiraga' => $request->wiraga,
                    'wirasa' => $request->wirasa,
                ]);
            } else {
                $edit = $nilai->update([
                    'tari_id' => $request->tari,
                    'wirama' => $request->wirama,
                    'wiraga' => $request->wiraga,
                    'wirasa' => $request->wirasa,
                ]);
            }
        }

        if ($edit) {
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nilai  $nilai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nilai $nilai)
    {
        $delete = $nilai->delete();

        if ($delete) {
            //redirect dengan pesan sukses
            return redirect()->route('nilai.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('nilai.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }

    function export()
    {
        return Excel::download(new NilaiExport(), 'nilai_tari.xlsx');
    }
}
