<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\BpjsController;
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
Route::post('/menu/store', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{menu}/edit', [MenuController::class, 'edit']);
Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
Route::get('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.destroy');

// examples
Route::get('/examples/blank',[HomeController::class, 'blank'])->name('examples/blank');
Route::get('/examples/table',[HomeController::class, 'table'])->name('examples/table');
Route::get('/examples/kanban',[HomeController::class, 'kanban'])->name('examples/kanban');
Route::get('/examples/form',[HomeController::class, 'form'])->name('examples/form');

//Karyawan
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::get('/karyawan/create', [KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('karyawan/store', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/edit/{id}', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{id}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{id}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');
Route::get('/karyawan/profil/{id}', [KaryawanController::class, 'profil'])->name('karyawan.profil');
Route::get('/karyawan/anggotakeluargadelete/{id}', [KaryawanController::class, 'anggotakeluargadelete'])->name('karyawan.anggotakeluargadelete');
Route::post('/karyawan/anggotakeluargaupdate/{id}', [KaryawanController::class, 'anggotakeluargaupdate'])->name('karyawan.anggotakeluargaupdate');
Route::post('/karyawan/anggotakeluargastore/{id}', [KaryawanController::class, 'anggotakeluargastore'])->name('karyawan.anggotakeluargastore');
Route::get('/karyawan/pendidikandelete/{id}/{id2}', [KaryawanController::class, 'pendidikandelete'])->name('karyawan.pendidikandelete');
Route::post('/karyawan/pendidikanupdate/{id}/{id2}', [KaryawanController::class, 'pendidikanupdate'])->name('karyawan.pendidikanupdate');
Route::post('/karyawan/pendidikanstore/{id}', [KaryawanController::class, 'pendidikanstore'])->name('karyawan.pendidikanstore');

Route::post('/karyawan/berkasstore/{id}', [KaryawanController::class, 'berkasstore'])->name('karyawan.berkasstore');
Route::delete('/karyawan/berkasdelete/{id}/{id2}', [KaryawanController::class, 'berkasdelete'])->name('karyawan.berkasdelete');
Route::post('/karyawan/berkasupdate/{id}/{id2}', [KaryawanController::class, 'berkasupdate'])->name('karyawan.berkasupdate');

Route::post('/karyawan/pelatihanstore/{id}', [KaryawanController::class, 'pelatihanstore'])->name('karyawan.pelatihanstore');
Route::delete('/karyawan/pelatihandelete/{id}/{id2}', [KaryawanController::class, 'pelatihandelete'])->name('karyawan.pelatihandelete');
Route::post('/karyawan/pelatihanupdate/{id}/{id2}', [KaryawanController::class, 'pelatihanupdate'])->name('karyawan.pelatihanupdate');

Route::post('/karyawan/penghargaanstore/{id}', [KaryawanController::class, 'penghargaanstore'])->name('karyawan.penghargaanstore');
Route::delete('/karyawan/penghargaandelete/{id}/{id2}', [KaryawanController::class, 'penghargaandelete'])->name('karyawan.penghargaandelete');
Route::post('/karyawan/penghargaanupdate/{id}/{id2}', [KaryawanController::class, 'penghargaanupdate'])->name('karyawan.penghargaanupdate');

Route::post('/karyawan/keahlianstore/{id}', [KaryawanController::class, 'keahlianstore'])->name('karyawan.keahlianstore');
Route::delete('/karyawan/keahliandelete/{id}/{id2}', [KaryawanController::class, 'keahliandelete'])->name('karyawan.keahliandelete');
Route::post('/karyawan/keahlianupdate/{id}/{id2}', [KaryawanController::class, 'keahlianupdate'])->name('karyawan.keahlianupdate');

Route::post('/karyawan/pengalamankerjastore/{id}', [KaryawanController::class, 'pengalamankerjastore'])->name('karyawan.pengalamankerjastore');
Route::get('/karyawan/pengalamankerjadelete/{id}/{id2}', [KaryawanController::class, 'pengalamankerjadelete'])->name('karyawan.pengalamankerjadelete');
Route::post('/karyawan/pengalamankerjaupdate/{id}/{id2}', [KaryawanController::class, 'pengalamankerjaupdate'])->name('karyawan.pengalamankerjaupdate');


// BPJS
Route::get('/bpjs', [BpjsController::class, 'index'])->name('bpjs.index');
Route::get('/bpjs/create', [BpjsController::class, 'create'])->name('bpjs.create');
Route::post('/bpjs/store', [BpjsController::class, 'store'])->name('bpjs.store');
Route::get('/bpjs/edit/{id}', [BpjsController::class, 'edit']);
Route::post('/bpjs/update/{id}', [BpjsController::class, 'update'])->name('bpjs.update');
Route::get('/bpjs/delete/{id}', [BpjsController::class, 'delete'])->name('bpjs.delete');

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

