<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SekolahController;
use App\Http\Controllers\Admin\BeritaController as AdminBeritaController;
use App\Http\Controllers\Admin\GaleriController as AdminGaleriController;
use App\Http\Controllers\Admin\EkstrakurikulerController as AdminEkstrakurikulerController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PpdbController;
use App\Http\Controllers\Admin\PendaftaranController as AdminPendaftaranController; 
use App\Http\Controllers\Admin\ProfilController as AdminProfilController;   
use App\Http\Controllers\Admin\JurusanController as AdminJurusanController;


// ==================================================
// WEBSITE
// ==================================================

Route::get('/', [SekolahController::class, 'beranda'])
    ->name('beranda');

Route::get('/profil', [SekolahController::class, 'profil'])
    ->name('profil');

Route::get('/ekstrakurikuler', [SekolahController::class, 'ekstrakurikuler'])
    ->name('ekstrakurikuler');

Route::get('/galeri', [SekolahController::class, 'galeri'])
    ->name('galeri');

Route::get('/berita', [SekolahController::class, 'berita'])
    ->name('berita');

Route::get('/berita/{id}', [SekolahController::class, 'beritaShow'])
    ->name('berita.show');


// ==================================================
// PPDB
// ==================================================

Route::get('/ppdb', function () {
    return view('ppdb');
})->name('ppdb');

Route::get('/ppdb/daftar', [PpdbController::class, 'create'])->name('ppdb.create');
Route::post('/ppdb/daftar', [PpdbController::class, 'store'])->name('ppdb.store');
Route::get('/ppdb/sukses', [PpdbController::class, 'sukses'])->name('ppdb.sukses');


// ==================================================
// LOGIN ADMIN
// ==================================================

Route::get('/login', [AuthController::class, 'showLogin'])
    ->name('login');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.process');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');


// ==================================================
// ADMIN
// ==================================================

Route::middleware('auth')
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

        // DASHBOARD ADMIN
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('dashboard');

                // PROFIL SEKOLAH
        Route::get('/profil', [AdminProfilController::class, 'edit'])
            ->name('profil.edit');

        Route::put('/profil', [AdminProfilController::class, 'update'])
            ->name('profil.update');

        // BERITA
        Route::resource('berita', AdminBeritaController::class)
            ->except(['show'])
            ->parameters([
                'berita' => 'berita'
            ]);

        Route::post('/berita/{berita}/toggle-status',
            [AdminBeritaController::class, 'toggleStatus']
        )->name('berita.toggle-status');

        // GALERI
        Route::resource('galeri', AdminGaleriController::class)
            ->except(['show']);

        Route::post('/galeri/{galeri}/toggle-status',
            [AdminGaleriController::class, 'toggleStatus']
        )->name('galeri.toggle-status');

        // EKSTRAKURIKULER
        Route::resource('ekstrakurikuler', AdminEkstrakurikulerController::class)
            ->except(['show']);

        Route::resource('pendaftaran', AdminPendaftaranController::class)
            ->except(['create', 'store', 'edit', 'update']);

        Route::put('/pendaftaran/{pendaftaran}/status', [AdminPendaftaranController::class, 'updateStatus'])
            ->name('pendaftaran.update-status');

                // JURUSAN & KELAS KHUSUS
        Route::resource('jurusan', AdminJurusanController::class)
            ->except(['show'])
            ->parameters([
                'jurusan' => 'jurusan'
            ]);

    });