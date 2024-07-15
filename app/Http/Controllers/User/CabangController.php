<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CabangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabang = User::orderby('name', 'asc')->where('role', 'cabang')->get();
        return view('user.cabang.index', compact('cabang'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.cabang.create');
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
            'name' => 'required',
            'email' => 'required|email',
        ]);

        $id = explode(" ", $request->name);
        foreach ($id as $key ) {
            $cabang = substr($key[0],0,1);
        };

        $cabang = User::create([
            'singkatan' => $request->singkatan,
            'name' => $request->name,
            'foto' => 'image/default.png',
            'role' => 'cabang',
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        if ($cabang) {
            //redirect dengan pesan sukses
            return redirect()->route('cabang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cabang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        // 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $cabang)
    {
        return view('user.cabang.edit', compact('cabang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $cabang)
    {
        $this->validate($request, [
            'name' => 'required',
            'singkatan' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->password == '') {
            $edit = $cabang->update([
                'name' => $request->name,
                'singkatan' => $request->singkatan,
                'email' => $request->email,
            ]);
        } else {
            $edit = $cabang->update([
                'name' => $request->name,
                'singkatan' => $request->singkatan,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        if ($edit) {
            //redirect dengan pesan sukses
            return redirect()->route('cabang.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cabang.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $cabang)
    {
        $siswa = Siswa::where('cabang', $cabang->singkatan);
        $siswa->delete();
        $siswa->nilai->delete();
        $siswa->vokal->delete();
        $siswa->sinopsis->delete();
        $cabang->delete();

        if ($cabang) {
            //redirect dengan pesan sukses
            return redirect()->route('cabang.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('cabang.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
