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

Route::get('/', '\App\Http\Controllers\MenuController@index')->name('menu');
Route::post('/tambah', '\App\Http\Controllers\MenuController@tambah')->name('tambah');
Route::post('/buat', '\App\Http\Controllers\MenuController@buat_pesanan')->name('buat_pesanan');
Route::get('/pendapatan', '\App\Http\Controllers\MenuController@pendapatan')->name('pendapatan');
