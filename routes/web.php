<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;

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

Route::redirect('/', '/login');

Route::get('/test', function () {
    return view('layouts.app');
});

Route::get('/home', function () {
    return view('home');
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

