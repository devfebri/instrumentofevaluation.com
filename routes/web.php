<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontController;
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


Route::prefix('admin')->middleware('auth', 'role:admin')->name('admin_')->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/item', [ItemController::class, 'index'])->name('item');
    Route::post('/item/create', [ItemController::class, 'create'])->name('itemcreate');
});
