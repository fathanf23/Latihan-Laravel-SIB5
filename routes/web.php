<?php

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

Route::get('/', function () {
    return view('welcome');
});

ROUTE::get('/salam', function(){
    return "Assalamualaikum selamat belajar laravel";
});

//tambah routing
Route::get('/staff/{nama}/{divisi}', function($nama, $divisi){
    return 'Nama Pegawai : '. $nama. '<br> Departemen : '. $divisi; 
});
Route::get('/kondisi', function(){
    return view('kondisi');
});