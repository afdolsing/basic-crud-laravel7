<?php

use App\Http\Controllers\CrudController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// CRUD : Query Builder
Route::get('/profil', 'CrudController@index'); // route berfungsi menampilkan halaman profile home nya
Route::get('/profil/tambah', 'CrudController@tambah'); // route berfungsi menampilkan halaman form tambah profile
Route::post('/profil/store', 'CrudController@store'); // route berfungsi menjalankan fungsi insert data ke db
Route::get('/profil/edit/{id}', 'CrudController@edit'); // route berfungsi menampilkan halaman detail data profile yang mau diedit
Route::post('/profil/update', 'CrudController@update'); // route berfungsi fungsi update data profil ke db
Route::get('/profil/hapus/{id}', 'CrudController@hapus'); // route berfungsi menjalankan fungsi delete data profil ke db
Route::get('/profil/cari', 'CrudController@cari'); // route berfungsi menjalankan fungsi pencarian data ke db
