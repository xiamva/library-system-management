<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Route untuk Data book
Route::get('/book', 'BookController@bookappears');
Route::post('/book/add','BookController@bookadd');
Route::get('/book/delete/{book_id}','BookController@bookdelete');
Route::put('/book/edit/{book_id}', 'BookController@bookedit');

//Route untuk Data book
Route::get('/home', function(){return view('view_home');});

//Route untuk Data Anggota
Route::get('/anggota', 'AnggotaController@anggotaappears');
Route::post('/anggota/add', 'AnggotaController@anggotaadd');
Route::get('/anggota/delete/{id_anggota}', 'AnggotaController@anggotadelete');
Route::put('/anggota/edit/{id_anggota}', 'AnggotaController@anggotaedit');

//Route untuk Data Petugas
Route::get('/petugas', 'PetugasController@petugasappears');
Route::post('/petugas/add', 'PetugasController@petugasadd');
Route::get('/petugas/delete/{id_petugas}', 'PetugasController@petugasdelete');
Route::put('/petugas/edit/{id_petugas}', 'PetugasController@petugasedit');

//Route untuk Data Peminjaman
Route::get('/pinjam', 'PinjamController@pinjamappears');
Route::post('/pinjam/add','PinjamController@pinjamadd');
Route::get('/pinjam/delete/{id_pinjam}','PinjamController@pinjamdelete');
Route::put('/pinjam/edit/{id_pinjam}', 'PinjamController@pinjamedit');

