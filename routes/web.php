<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\MindsetSiswaController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\SkorController;
use App\Http\Controllers\TugasJawabanController;
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

Route::get('/perkembangan_otak',[FrontController::class,'perkembangan_otak'])->name('perkembangan_otak');
Route::get('/pola_pikir_berkembang',[FrontController::class, 'pola_pikir_berkembang'])->name('pola_pikir_berkembang');
Route::get('/pola_pikir_tetap',[FrontController::class, 'pola_pikir_tetap'])->name('pola_pikir_tetap');
Route::get('/front_mindset',[FrontController::class, 'front_mindset'])->name('front_mindset');
Route::get('/indikator_pola_pikir',[FrontController::class, 'indikator_pola_pikir'])->name('indikator_pola_pikir');
Route::get('/kekayaan_lokal_jambi',[FrontController::class, 'kekayaan_lokal_jambi'])->name('kekayaan_lokal_jambi');

Route::get('login',[AuthController::class,'login'])->name('login');
Route::get('register',[AuthController::class, 'register'])->name('register');
Route::post('/proses_register',[AuthController::class, 'proses_register'])->name('proses_register');
Route::post('/proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/simpanjawaban', [JawabanController::class, 'simpanjawaban'])->name('simpanjawaban');


Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin_')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/item', [ItemController::class, 'index'])->name('item');
    Route::post('/item/create', [ItemController::class, 'create'])->name('itemcreate');

    Route::get('/user',[UserController::class,'index'])->name('user');
    Route::get('/getDosen', [UserController::class, 'getDosen'])->name('getDosen');
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
    Route::delete('/matakuliah/{id}', [KelasController::class, 'deletematakuliah'])->name('deletematakuliah');
    Route::get('/getMatakuliah/{id}', [KelasController::class, 'getMatakuliah'])->name('getMatakuliah');
    Route::post('/kelas/matakuliahtambah', [KelasController::class, 'tambahmatakuliah'])->name('tambahmatakuliah');
    Route::get('/kelas/matakuliah/open/{id}', [KelasController::class, 'openmatakuliah'])->name('matakuliahopen');
    Route::get('/getTugas/{id}', [KelasController::class, 'getTugas'])->name('getTugas');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'kelasedit'])->name('kelasedit');

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

    Route::get('/tugasjawaban/{id}', [TugasJawabanController::class, 'index'])->name('tugasjawaban');

    Route::get('/mindset/open/openjawaban/{id}',[MindsetSiswaController::class,'mahasiswajawaban'])->name('jawaban');

    Route::get('/skor',[SkorController::class,'index'])->name('skor');
    Route::get('/skor/export/{id}', [SkorController::class, 'export'])->name('export');

});



Route::prefix('mahasiswa')->middleware('auth', 'role:mahasiswa')->name('mahasiswa_')->group(function () {
    Route::post('/updateprofile',[DashboardController::class,'updateprofile'])->name('updateprofile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/kelas/{id}', [KelasController::class, 'siswaopen'])->name('siswaopen');
    Route::get('/siswa_mindset', [MindsetSiswaController::class, 'index'])->name('siswamindset');
    Route::get('/mindset', [PertanyaanController::class, 'mindset'])->name('mindset');
    Route::get('/siswa_mindset/open/{id}', [MindsetSiswaController::class, 'openmindset'])->name('siswaopenmindset');
    Route::get('/kerjakansoal/{id}',[MindsetSiswaController::class,'kerjakansoal'])->name('kerjakansoal');

    Route::get('/kelas/open/{id}', [KelasController::class, 'open'])->name('kelasopen');
    Route::get('/getMatakuliah/{id}', [KelasController::class, 'getMatakuliah'])->name('getMatakuliah');
    Route::get('/getMahasiswa/{id}', [KelasController::class, 'getMahasiswa'])->name('getMahasiswa');
    Route::get('/kelas/matakuliah/open/{id}', [KelasController::class, 'openmatakuliah'])->name('matakuliahopen');
    Route::get('/getTugas/{id}', [KelasController::class, 'getTugas'])->name('getTugas');
    Route::post('/kirimTugas', [KelasController::class, 'kirimtugas'])->name('kirimtugas');
    Route::get('/tugasjawaban/{id}', [TugasJawabanController::class, 'index'])->name('tugasjawaban');
    Route::get('/getSoal/{id}',[MindsetSiswaController::class,'getSoal'])->name('getSoal');
    Route::post('/siswakirimtugas',[MindsetSiswaController::class,'siswakirimtugas'])->name('siswakirimtugas');
});


Route::prefix('dosen')->middleware('auth', 'role:dosen')->name('dosen_')->group(function () {
    Route::post('/updateprofile', [DashboardController::class, 'updateprofile'])->name('updateprofile');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/kelas', [KelasController::class, 'index'])->name('kelas');
    Route::post('/kelas/tambah', [KelasController::class, 'tambah'])->name('kelastambah');
    Route::delete('/kelas/{id}', [KelasController::class, 'delete'])->name('kelasdelete');
    Route::get('/kelas/open/{id}', [KelasController::class, 'open'])->name('kelasopen');
    Route::post('/kelas/materitambah', [KelasController::class, 'tambahmateri'])->name('tambahmateri');
    Route::post('/kelas/tugastambah', [KelasController::class, 'tambahtugas'])->name('tambahtugas');
    Route::post('/kelas/matakuliahtambah', [KelasController::class, 'tambahmatakuliah'])->name('tambahmatakuliah');
    Route::get('/kelas/matakuliah/open/{id}', [KelasController::class, 'openmatakuliah'])->name('matakuliahopen');
    Route::post('/kelas/mahasiswatambah', [KelasController::class, 'tambahmahasiswa'])->name('tambahmahasiswa');

    Route::delete('/materi/{id}', [KelasController::class, 'deletemateri'])->name('deletemateri');
    Route::get('/materi/edit/{id}', [KelasController::class, 'materiedit'])->name('materiedit');
    Route::delete('/tugas/{id}', [KelasController::class, 'deletetugas'])->name('deletetugas');
    Route::get('/getMahasiswa/{id}', [KelasController::class, 'getMahasiswa'])->name('getMahasiswa');
    Route::delete('/mahasiswa/{id}', [KelasController::class, 'deletemahasiswa'])->name('deletemahasiswa');
    Route::delete('/matakuliah/{id}', [KelasController::class, 'deletematakuliah'])->name('deletematakuliah');
    Route::get('/getMatakuliah/{id}', [KelasController::class, 'getMatakuliah'])->name('getMatakuliah');
    Route::get('/getTugas/{id}', [KelasController::class, 'getTugas'])->name('getTugas');
    Route::get('/kelas/edit/{id}', [KelasController::class, 'tugasedit'])->name('tugasedit');

    Route::get('/tugasjawaban/{id}', [TugasJawabanController::class, 'index'])->name('tugasjawaban');

});
