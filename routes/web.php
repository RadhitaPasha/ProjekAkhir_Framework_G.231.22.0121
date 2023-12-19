<?php


use Illuminate\Support\Facades\Route;


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

Route::get('/info', function () {
    return view('info', ['progdi' => 'TI']);
});

use App\Http\Controllers\InfoController;

Route::get('/info/{kd}', [InfoController::class, 'infoMhs']);

Route::get('/buku', function () {
    return view('buku.add', [
        'is_update' => 0,
        'optkategori' => [
            '' => '-Pilih salah satu -',
            'novel' => 'Novel',
            'komik' => 'Komik',
            'kamus' => 'Kamus',
            'program' => 'Pemrograman'
        ]
    ]);
});

use App\Http\Controllers\BukuController;

// Update routes
Route::get('/buku', [BukuController::class, 'index']);
Route::get('/buku/add', [BukuController::class, 'add_new']);
Route::get('/buku/save', [BukuController::class, 'save']);
Route::get('/buku/edit/{id}', [BukuController::class, 'edit']);
Route::get('/buku/delete/{id}', [BukuController::class, 'delete']);

use App\Http\Controllers\AnggotaController;

Route::get('/anggota', [AnggotaController::class, 'index']);
Route::get('/anggota/create', [AnggotaController::class, 'create']);
Route::get('/anggota/save', [AnggotaController::class, 'store']);
Route::get('/anggota/edit/{id}', [AnggotaController::class, 'edit']);
Route::get('/anggota/delete/{id}', [AnggotaController::class, 'delete']);
