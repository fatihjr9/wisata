<?php

use App\Models\Kategori;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BeritaController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\KategoriController;

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
Route::get('/', [ClientController::class,'index'])->name('client.index');
Route::get('/detail/{id}', [ClientController::class,'detail'])->name('client.detail');
Route::get('/berita', function () { return view('client.berita'); });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    // Wisata
    Route::get('/admin/wisata', [WisataController::class,'index'])->name('admin.wisata.index');
    Route::get('/admin/wisata/add', [WisataController::class,'create'])->name('admin.wisata.create');
    Route::post('/admin/wisata/add', [WisataController::class,'store'])->name('admin.wisata.store');
    Route::delete('/admin/wisata/{id}', [WisataController::class,'destroy'])->name('admin.wisata.destroy');
    Route::get('/admin/wisata/update/{id}', [WisataController::class,'edit'])->name('admin.wisata.update');
    Route::POST('/admin/wisata/update/store', [WisataController::class,'updateStore'])->name('admin.wisata.update.store');
    // Berita
    Route::get('/admin/berita', [BeritaController::class,'index'])->name('admin.berita.index');
    Route::get('/admin/berita/add', [BeritaController::class,'create'])->name('admin.berita.create');
    Route::post('/admin/berita/add', [BeritaController::class,'store'])->name('admin.berita.store');
    Route::get('/admin/berita/destroy/{id}', [BeritaController::class,'destroy'])->name('admin.berita.destroy');
    Route::get('/admin/berita/update/{id}', [BeritaController::class,'update'])->name('admin.berita.update');
    Route::POST('/admin/berita/update', [BeritaController::class,'updateStore'])->name('admin.berita.update.store');
    // Kategori Berita
    Route::get('/admin/kategori', [KategoriController::class,'index'])->name('admin.kategori.index');
    Route::post('/admin/kategori/add', [KategoriController::class,'create'])->name('admin.kategori.store');
    Route::get('/admin/kategori/destroy/{id}', [KategoriController::class,'destroy'])->name('admin.kategori.destroy');
});
