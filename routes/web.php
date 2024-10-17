<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\AccessoriesController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
})->name('welcome');

// Route::httpMethod('/path', [NamaController::class, 'namaFunc'])->name('identitas_route');
// httpMethod 
// get -> mengambil data/menampilkan halaman
// post -> mengirim data ke database (tambah data)
// patch/put -> mengubah data di database
// delete -> menghapus data
Route::get('/landing-page', [LandingPageController::class, 'index'])->name('landing_page');




//untuk mengelola data obat
Route::prefix('/produk')->name('produk_aksesoris.')->group(function(){
    Route::get('/data', [AccessoriesController::class, 'index'])->name('data');
    Route::get('/tambah', [AccessoriesController::class, 'create'])->name('tambah');
    Route::post('/tambah/proses', [AccessoriesController::class, 'store'])->name('tambah.proses');
    Route::get('/ubah/{id}', [AccessoriesController::class, 'edit'])->name('ubah');
    Route::patch('ubah/{id}proses', [AccessoriesController::class, 'update'])->name('ubah.proses');
    Route::delete('/accessories/{id}', [AccessoriesController::class, 'destroy'])->name('accessories.hapus');

});

Route::prefix('/kelola_akun')->name('kelola_akun.')->group(function(){
    Route::get('/data', [UserController::class, 'index'])->name('data');
    Route::get('/tambah', [UserController::class, 'create'])->name('tambah');
    Route::post('/tambah/proses', [UserController::class, 'store'])->name('tambah.proses');
    Route::get('/ubah/{id}', [UserController::class, 'edit'])->name('ubah');
    Route::patch('ubah/{id}proses', [UserController::class, 'update'])->name('ubah.proses');
    Route::delete('/hapus/{id}', [UserController::class, 'destroy'])->name('hapus');
});
