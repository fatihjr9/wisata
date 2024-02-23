<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\ClientController;
use Illuminate\Support\Facades\Route;

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
    // Berita
    Route::get('/admin/berita', [BeritaController::class,'index'])->name('admin.berita.index');
    Route::get('/admin/berita/add', [BeritaController::class,'create'])->name('admin.berita.create');
    Route::post('/admin/berita/add', [BeritaController::class,'store'])->name('admin.berita.store');
    Route::get('/admin/berita/destroy/{id}', [BeritaController::class,'destroy'])->name('admin.berita.destroy');
    Route::get('/admin/berita/update/{id}', [BeritaController::class,'destroy'])->name('admin.berita.update');
});
