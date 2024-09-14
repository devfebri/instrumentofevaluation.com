<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\UserController;
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

Route::get('/',[FrontController::class,'index'])->name('welcome');
Route::get('/pembelajaran_pjbl',[FrontController::class, 'pembelajaran_pjbl'])->name('pembelajaran_pjbl');
Route::get('/brainstorming',[FrontController::class, 'brainstorming'])->name('brainstorming');
Route::get('/instrumen',[FrontController::class, 'instrumen'])->name('instrumen');
Route::get('/tespolapikir',[FrontController::class, 'tespolapikir'])->name('tespolapikir');
Route::get('/contact',[FrontController::class, 'contact'])->name('contact');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/simpanjawaban', [JawabanController::class, 'simpanjawaban'])->name('simpanjawaban');


Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin_')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/item', [ItemController::class, 'index'])->name('item');
    Route::post('/item/create', [ItemController::class, 'create'])->name('itemcreate');

    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::post('/user/tambah',[UserController::class,'tambah'])->name('usertambah');
    Route::delete('/user/{id}',[UserController::class,'delete'])->name('userdelete');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas/tambah', [KelasController::class, 'tambah'])->name('kelastambah');
    Route::delete('/kelas/{id}', [KelasController::class, 'delete'])->name('kelasdelete');
    Route::get('/kelas/open/{id}',[KelasController::class,'open'])->name('kelasopen');
    Route::post('/kelas/materitambah', [KelasController::class, 'tambahmateri'])->name('tambahmateri');
    Route::delete('/materi/{id}', [KelasController::class, 'deletemateri'])->name('deletemateri');
    Route::post('/kelas/mahasiswatambah', [KelasController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');
    Route::get('/getMahasiswa/{id}', [KelasController::class, 'getMahasiswa'])->name('getMahasiswa');
    Route::delete('/mahasiswa/{id}', [KelasController::class, 'deletemahasiswa'])->name('deletemahasiswa');

    Route::get('/mindset', [PertanyaanController::class, 'mindset'])->name('mindset');
    Route::post('/mindset/tambah', [PertanyaanController::class, 'tambahmindset'])->name('mindsettambah');
    Route::delete('/mindset/{id}', [PertanyaanController::class, 'deletemindset'])->name('mindsetdelete');
    Route::get('/mindset/open/{id}',[PertanyaanController::class,'openmindset'])->name('openmindset');
    Route::post('/mindset/indikator/tambah', [PertanyaanController::class, 'tambahindikator'])->name('indikatortambah');
    Route::delete('/mindset/indikator/{id}', [PertanyaanController::class, 'deleteindikator'])->name('indikatordelete');
    Route::get('/mindset/{id}/edit', [PertanyaanController::class, 'mindsetedit'])->name('mindsetedit');
    Route::get('/indikator/{id}/edit', [PertanyaanController::class, 'indikatoredit'])->name('indikatoredit');

    Route::get('/soal/{id}', [PertanyaanController::class, 'soal'])->name('soal');
    Route::post('/soal/tambah', [PertanyaanController::class, 'tambahsoal'])->name('soaltambah');
    Route::delete('/soal/{id}', [PertanyaanController::class, 'deletesoal'])->name('soaldelete');
    Route::get('/soal/edit/{id}', [PertanyaanController::class, 'editsoal'])->name('soaledit');

    Route::get('/soalfront', [PertanyaanController::class, 'soalfront'])->name('soalfront');
    Route::post('/soalfront/tambah', [PertanyaanController::class, 'soalfronttambah'])->name('soalfronttambah');
    Route::delete('/soalfront/{id}', [PertanyaanController::class, 'soalfrontdelete'])->name('soalfrontdelete');
    Route::get('/soalfront/edit/{id}', [PertanyaanController::class, 'soalfrontedit'])->name('soalfrontedit');




});


Route::prefix('mahasiswa')->middleware('auth', 'role:mahasiswa')->name('mahasiswa_')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});
