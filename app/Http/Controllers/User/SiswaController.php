<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Imports\SiswaImport;
use App\Models\Background;
use App\Models\Nilai;
use App\Models\Nilaivokal;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;

class SiswaController extends Controller
{
    public function index()
    {
        $siswas = Siswa::orderby('nama_siswa', 'asc')->get();
        $kelas = Background::all();
        // dd($siswa);
        // dd($kelas);
        // $user = User::all()->where('role', 'cabang')->first();
        // dd($user->tempat->name);
        return view('user.siswa.index', compact('siswas', 'kelas'));
    }

    /**
     * create
     *
     * @return void
     */
    public function create()
    {
        $kelas = Background::all();
        $cabang = User::all()->where('role', 'cabang');
        return view('user.siswa.create', compact('kelas', 'cabang'));
    }

    /**
     * store
     *
     * @param  mixed $request
     * @return void
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'cabang' => 'required',
            'cabang' => 'required',
        ]);

        $siswa = Siswa::create([
            'foto' => 'image/default.png',
            'no_induk' => $request->no_induk,
            'nama_siswa' => $request->nama_siswa,
            'semester' => 1,
            'tanggal_lahir' => $request->tanggal_lahir,
            'orang_tua' => $request->orang_tua,
            'alamat' => $request->alamat,
            'cabang' => $request->cabang,
            'kelas' => $request->kelas,
            'password' => Hash::make('password'),
        ]);

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Disimpan!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * edit
     *
     * @param  mixed $siswa
     * @return void
     */
    public function edit(Siswa $siswa)
    {
        $kelas = Background::all();
        $cabang = User::all()->where('role', 'cabang');
        return view('user.siswa.edit', compact('siswa', 'kelas', 'cabang'));
    }

    public function show(Siswa $siswa)
    {
        return view('user.siswa.show', compact('siswa'));
    }

    /**
     * update
     *
     * @param  mixed $request
     * @param  mixed $siswa
     * @return void
     */
    public function update(Request $request, siswa $siswa)
    {
        $this->validate($request, [
            'no_induk' => 'required',
            'nama_siswa' => 'required',
            'tanggal_lahir' => 'required',
            'orang_tua' => 'required',
            'alamat' => 'required',
            'cabang' => 'required',
            'kelas' => 'required',
        ]);

        if ($request->foto != '') {
            $file = $request->file('foto');

            // Mendapatkan Nama File
            $extension = $file->getClientOriginalExtension();
            $name = $request->nama_siswa;
            $nama = explode(" ", $name);
            $nama_file = join("-", $nama) . "." . $extension;

            // Proses Upload File
            $destinationPath = 'image/siswa';
            $file->move($destinationPath, $nama_file);
            $filenameSimpan = $destinationPath . '/' . $nama_file;
        }

        if ($request->foto == '' && $request->password == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
            ]);
        } elseif ($request->foto == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
            ]);
        } elseif ($request->password == '') {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'foto' => $filenameSimpan,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
            ]);
        } else {
            $siswa->update([
                'no_induk' => $request->no_induk,
                'foto' => $filenameSimpan,
                'nama_siswa' => $request->nama_siswa,
                'tanggal_lahir' => $request->tanggal_lahir,
                'orang_tua' => $request->orang_tua,
                'alamat' => $request->alamat,
                'cabang' => $request->cabang,
                'kelas' => $request->kelas,
                'password' => Hash::make($request->password),
            ]);
        }

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Diupdate!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Diupdate!']);
        }
    }

    /**
     * destroy
     *
     * @param  mixed $id
     * @return void
     */
    public function destroy(Siswa $siswa)
    {
        $file = public_path('/') . $siswa->foto;
        $default = public_path('/image/default.png');

        if (file_exists($file)) {
            if ($file != $default) {
                @unlink($file);
            }
        }

        $siswa->nilai->delet();
        $siswa->vokal->delete();
        $siswa->sinopsis->delete();
        $siswa->delete();

        if ($siswa) {
            //redirect dengan pesan sukses
            return redirect()->route('siswa.index')->with(['success' => 'Data Berhasil Dihapus!']);
        } else {
            //redirect dengan pesan error
            return redirect()->route('siswa.index')->with(['error' => 'Data Gagal Dihapus!']);
        }
    }
    public function fileImport(Request $request)
    {
        Excel::import(new SiswaImport, $request->file('file')->store('temp'));
        return back();
    }
}
