<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BarangMasukController;
use App\Http\Controllers\StockBarangController;
use App\Http\Controllers\BarangKeluarController;

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
    return view('auth.login');
});
Route::get('/register', function () {
    return view('auth.register');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('logs', LogController::class);

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    route::put('/users/{id}', [UserController::class, 'update'])->name('users.update');
    route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::get('/stock-barang', [StockBarangController::class, 'index'])->name('stock.barang.index');

    Route::get('/barang/masuk', [BarangMasukController::class, 'index'])->name('barang.masuk.index');
    Route::post('/barang/masuk', [BarangMasukController::class, 'store'])->name('barang.masuk.store');
    Route::put('/barang/masuk/{id}', [BarangMasukController::class, 'update'])->name('barang.masuk.update');
    Route::delete('barang/masuk/{id}', [BarangMasukController::class, 'destroy'])->name('barang.masuk.destroy');

    Route::get('/barang/keluar', [BarangKeluarController::class, 'index'])->name('barang.keluar.index');
    Route::post('/barang/keluar', [BarangKeluarController::class, 'store'])->name('barang.keluar.store');
    Route::put('/barang/keluar/{id}', [BarangKeluarController::class, 'update'])->name('barang.keluar.update');
    Route::delete('barang/keluar/{id}', [BarangKeluarController::class, 'destroy'])->name('barang.keluar.destroy');
});
