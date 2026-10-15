<?php

use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $kategori = DB::table('m_kategori')
        ->select('id', 'nama_kategori')
        ->orderBy('id')
        ->get();

    $galeri = DB::table('uploaded_file')
        ->join('m_kategori', 'uploaded_file.kategori_id', '=', 'm_kategori.id')
        ->select(
            'uploaded_file.id',
            'uploaded_file.tipe_file',
            'uploaded_file.judul_karya',
            'uploaded_file.dokumen',
            'uploaded_file.kategori_id',
            'uploaded_file.harga',
            'uploaded_file.lokasi_pengambilan',
            'm_kategori.nama_kategori'
        )
        ->orderByDesc('uploaded_file.id')
        ->get()
        ->map(function ($item) {
            $item->url = asset('storage/' . $item->dokumen);
            return $item;
        });

    return view('index', compact('kategori', 'galeri'));
})->name('index');

/*
|--------------------------------------------------------------------------
| ADMIN AUTHENTICATION
|--------------------------------------------------------------------------
*/

// Halaman Login
Route::get('/login-admin', [AdminLoginController::class, 'showLogin'])
    ->name('login');

// Proses Login
Route::post('/login-admin', [AdminLoginController::class, 'login'])
    ->name('login.process');

// Logout
Route::post('/logout', [AdminLoginController::class, 'logout'])
    ->name('logout');


/*
|--------------------------------------------------------------------------
| ADMIN DASHBOARD
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin.dashboard');

    Route::get('/kelola-galeri', [DashboardController::class, 'kelolaGaleri'])->name('admin.kelola-galeri');

    // Proses upload foto/video
    Route::post('/admin/upload', [DashboardController::class, 'upload'])
        ->name('admin.upload');

    Route::put('/admin/kelola-galeri/{id}', [
        DashboardController::class, 'update'
    ])->name('admin.kelola-galeri.update');

    Route::delete('/admin/kelola-galeri/{id}', [
        DashboardController::class, 'destroy'
    ])->name('admin.kelola-galeri.destroy');

});
