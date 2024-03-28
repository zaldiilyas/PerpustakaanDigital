<?php

use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ConfirmationController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DataBukuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PetugasController;
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

Route::resource('/', HomeController::class);

Route::resource('/book', BookController::class);

Route::resource('/categories', CategoryController::class);

Route::get('/login', [LoginController::class, 'tampil_login'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/register', [LoginController::class, 'tampil_register']);
Route::post('/register', [LoginController::class, 'register']);

Route::get('/registerAdmin', [LoginController::class, 'tampil_register_admin']);
Route::post('/registerAdmin', [LoginController::class, 'registerAdmin']);

Route::resource('/dataPetugas', PetugasController::class)->middleware('admin');
Route::get('/tambahPetugas', [PetugasController::class, 'create'])->middleware('admin');
Route::post('/tambahPetugas', [PetugasController::class, 'store'])->middleware('admin');
Route::delete('/dataPetugas/{id}', [PetugasController::class, "destroy"])->middleware('admin');

Route::get('/logout', [LoginController::class, 'logout'])->middleware('auth');

// Route::resource('/dashboard', DashboardController::class);

Route::resource('/dataBuku', DataBukuController::class)->middleware('petugasdanadmin');
Route::get('/tambahBuku', [DataBukuController::class, "create"])->middleware('petugasdanadmin');
Route::post('/tambahBuku', [DataBukuController::class, "store"])->middleware('petugasdanadmin');
Route::get('/detailBuku/{id}', [DataBukuController::class, "show"])->middleware('auth');
Route::delete('/dataBuku/{id}', [DataBukuController::class, "destroy"])->middleware('petugasdanadmin');
Route::put('/dataBuku/{id}', [DataBukuController::class, 'update'])->middleware('petugasdanadmin');

Route::resource('/dataKategori', KategoriController::class)->middleware('petugasdanadmin');
Route::get('/tambahKategori', [KategoriController::class, "create"])->middleware('petugasdanadmin');
Route::post('/tambahKategori', [KategoriController::class, "store"])->middleware('petugasdanadmin');
Route::delete('/dataKategori/{id}', [KategoriController::class, "destroy"])->middleware('petugasdanadmin');
Route::put('/dataKategori/{id}', [KategoriController::class, 'update'])->middleware('petugasdanadmin');

Route::resource('/konfirmasiPinjaman', ConfirmationController::class)->middleware('petugasdanadmin');
Route::put('/konfirmasiPinjaman/{id}', [ConfirmationController::class, 'update'])->middleware('petugasdanadmin');

Route::resource('/dataPinjaman', PeminjamanController::class)->middleware('auth');
Route::get('/detailPinjaman/{id}', [PeminjamanController::class, "show"])->middleware('auth');
Route::post('/detailPinjaman', [PeminjamanController::class, "store"])->middleware('auth');
Route::delete('/detailPinjaman/{id}', [PeminjamanController::class, "destroy"])->middleware('auth');
