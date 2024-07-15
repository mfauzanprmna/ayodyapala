<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class JuriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $juris = User::orderby('name', 'asc')->where('role', 'juri')->get();
        return view('user.juri.index', compact('juris'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.juri.create');
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

        $juris = User::create([
            'name' => $request->name,
            'foto' => 'image/default.png',
            'role' => 'juri',
            'email' => $request->email,
            'password' => Hash::make('password'),
        ]);

        if ($juris) {
            //redirect dengan pesan sukses
            return redirect()->route('juri.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('juri.index')->with(['error' => 'Data Gagal Disimpan!']);
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
    public function edit(User $juri)
    {
        return view('user.juri.edit', compact('juri'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $juri)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
        ]);

        if ($request->foto != '') {
            $file = $request->file('foto');

            // Mendapatkan Nama File
            $extension = $file->getClientOriginalExtension();
            $name = $request->name;
            $nama = explode(" ", $name);
            $nama_file = join("-", $nama) . "." . $extension;

            // Proses Upload File
            $destinationPath = 'image/juri';
            $file->move($destinationPath, $nama_file);
            $filenameSimpan = $destinationPath . '/' . $nama_file;
        }

        if ($request->foto == '' && $request->password == '') {
            $edit = $juri->update([
                'name' => $request->name,
                'email' => $request->email,
            ]);
        } elseif ($request->foto == '') {
            $edit = $juri->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        } elseif ($request->password == '') {
            $edit = $juri->update([
                'name' => $request->name,
                'foto' => $filenameSimpan,
                'email' => $request->email,
            ]);
        } else {
            $edit = $juri->update([
                'name' => $request->name,
                'foto' => $filenameSimpan,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
        }

        if ($edit) {
            //redirect dengan pesan sukses
            return redirect()->route('juri.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('juri.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $juri)
    {
        $file = public_path('/') . $juri->foto;
        $default = public_path('/image/default.png');

        if (file_exists($file)) {
            if ($file != $default) {
                @unlink($file);
            }
        }
        $juri->nilai->delete();
        $juri->vokal->delete();
        $juri->sinopsis->delete();
        $juri->delete();

        if ($juri) {
            //redirect dengan pesan sukses
            return redirect()->route('juri.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('juri.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
}
