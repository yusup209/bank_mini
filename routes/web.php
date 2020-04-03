<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'superadmin', 'middleware' => 'auth.superadmin'], function(){
    Route::resource('dataKelas', 'AppControllers\DataKelasController');
    Route::resource('dataAkun', 'AppControllers\DataAkunController');
    Route::resource('dataNasabah', 'AppControllers\DataNasabahController');
    Route::resource('dataTransaksi', 'AppControllers\DataTransaksiController');
    Route::resource('dataAkunInetBanking', 'AppControllers\DataAkunInternetBankingController');
    Route::resource('autoDebit', 'AppControllers\AutoDebetController');
});


Route::group(['prefix' => 'teller', 'middleware' => 'auth.teller'], function(){
    Route::resource('buatRekening', 'AppControllers\BuatRekeningBaru');
    Route::resource('regisInetBanking', 'AppControllers\RegisInternetBanking');
    Route::resource('setorTunai', 'AppControllers\SetorTunai');
    Route::resource('tarikTunai', 'AppControllers\TarikTunai');
    Route::resource('transfer', 'AppControllers\Transfer');
    Route::resource('pembayaran', 'AppControllers\Pembayaran');
});

Route::group(['prefix' => 'user', 'middleware' => 'auth.user'], function(){
    Route::resource('tabungan', 'AppControllers\Tabungan');
    Route::resource('riwayatTransaksi', 'AppControllers\RiwayatTransaksi');
    Route::resource('pembayaran', 'AppControllers\Pembayaran');
    Route::resource('transfer', 'AppControllers\Transfer');
});