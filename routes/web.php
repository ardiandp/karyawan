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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/test', function () {
    return view('layouts.app');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/login', [LoginController::class, 'index']);

// ini menggunakan midleware
Route::group(['middleware' => ['role:admin']], function () {
    Route::get('/admin', [HomeController::class, 'index']);
});

Route::group(['middleware' => ['role:user']], function () {
    Route::get('/user', [HomeController::class, 'index']);
});

