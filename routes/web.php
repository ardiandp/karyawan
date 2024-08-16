<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;
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


Route::get('/', [LoginController::class, 'index'])->name('login');

Route::get('/test', function () {
    return view('layouts.app');
});

Route::group(['middleware' => ['auth']], function () {
Route::get('/home', function () {
    return view('home');
});

// Route Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit']);
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::get('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

// Blank
Route::get('/blank',[HomeController::class, 'blank'])->name('blank');
Route::get('/table',[HomeController::class, 'table'])->name('table');


// Auth
});



Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// ini menggunakan midleware
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/homeadmin', [HomeController::class, 'indexadmin'])->middleware('role:admin');
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/homeuser', [HomeController::class, 'indexuser']);
});


// Route Menu
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit']);
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::get('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

