<?php

use App\Http\Controllers\AbsenController;
use App\Http\Controllers\LayoutController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\NilaivokalController;
use App\Http\Controllers\SertifikatController;
use App\Http\Controllers\TarianController;
use App\Http\Controllers\UndianController;
use App\Http\Controllers\SinopsisController;
use App\Http\Controllers\User\CabangController;
use App\Http\Controllers\User\JuriController;
use App\Http\Controllers\User\SiswaController;
use App\Models\Background;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

// Route::middleware(['auth:user'])->group(function () {
//     Route::get('/admin', function () {
//         return view('dashboardtampilan');
//     })->name('dashboard');
// });

Route::middleware(['auth:user', 'role:juri,admin,cabang'])->group(function () {
    // CRUD Nilai
    Route::resource('admin/nilai', NilaiController::class);
    Route::resource('admin/vokal', NilaivokalController::class);
    Route::resource('admin/sinopsis', SinopsisController::class);
    Route::resource('admin/undian', UndianController::class);
    Route::post('/getsiswa', [NilaiController::class, 'getSiswa'])->name('getsiswa');
    Route::get('/browse/tari', [NilaiController::class, 'browse'])->name('browse-tari');
    Route::get('/nilai_export', [NilaiController::class, 'export'])->name('nilai_export');

    // Dashboard
    Route::get('/dashboard', function () {
        $cabangs = User::all()->where('role', 'cabang');
        $siswa = Siswa::all();
        $kelas = Background::all();
        return view('dashboard.' . Auth::user()->role, compact('cabangs', 'kelas', 'siswa'));
    })->name('dashboard');
});

Route::middleware(['auth:user', 'role:cabang,admin'])->group(function () {
    // CRUD Siswa
    Route::resource('admin/siswa', SiswaController::class);
    Route::post('/file-import', [SiswaController::class, 'fileImport'])->name('file-import');

    // Sertifikat
    Route::get('/nilai/{id}', [SertifikatController::class, 'cetak_nilai'])->name('nilai.print');
    Route::get('/sertifikat', [SertifikatController::class, 'index']);
    Route::get('/sertifikat/{id}', [SertifikatController::class, 'cetak_sertifikat']);
    Route::post('/sertifikat/getSertifikat', [SertifikatController::class, 'getSertifikat'])->name('sertifikat.getSertifikat');
});

Route::group(['prefix' => 'admin', 'middleware' => ['auth:user', 'role:admin']], function () {
    // CRUD Data User
    Route::resource('/juri', JuriController::class);
    Route::resource('/cabang', CabangController::class);

    Route::resource('/absen', AbsenController::class);
    Route::resource('/tarian', TarianController::class);
    Route::resource('/layout', LayoutController::class);
    Route::post('/layout/serti', [LayoutController::class, 'serti'])->name('layout.serti');
    Route::post('/tari-import', [TarianController::class, 'fileImport'])->name('tari-import');
});

Route::middleware(['auth:siswa'])->group(function () {
    Route::get('/', function () {
        $time = date('H');
        $timezone = date("e");

        if ($time < "12") {
            $greetings = "Selamat Pagi";
        } elseif ($time >= "12" && $time < "15") {
            $greetings = "Selamat Siang";
        } elseif ($time >= "15" && $time < "18") {
            $greetings = "Selamat Sore";
        } elseif ($time >= "18") {
            $greetings = "Selamat Malam";
        }

        return view('dashboard.siswa', compact('greetings'));
    })->name('dashboard.siswa');
});



// Route::get('/', function () {
//     return view('welcome');
// });

require __DIR__ . '/auth.php';
