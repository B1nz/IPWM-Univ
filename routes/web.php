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

Auth::routes();

Route::get('signout', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);

Route::group(['middleware' => 'auth'], function(){
	
	Route::group(['middleware' => 'admin.only'], function(){
		Route::get('fakultas', ['as' => 'fakultas.index', 'uses' => 'FakultasController@index']);
		Route::get('fakultas/create', ['as' => 'fakultas.create', 'uses' => 'FakultasController@create']);
		Route::post('fakultas', ['as' => 'fakultas.store', 'uses' => 'FakultasController@store']);
		Route::get('fakultas/edit/{id}', ['as' => 'fakultas.edit', 'uses' => 'FakultasController@edit']);
		Route::put('fakultas/edit/{id}', ['as' => 'fakultas.update', 'uses' => 'FakultasController@update']);
        Route::get('fakultas/delete/{id}', ['as' => 'fakultas.delete', 'uses' => 'FakultasController@delete']);
        Route::post('fakultas/import', ['as' => 'fakultas.import', 'uses' => 'FakultasController@import']);

        Route::get('ruangan', ['as' => 'ruangan.index', 'uses' => 'RuanganController@index']);
        Route::get('ruangan/create', ['as' => 'ruangan.create', 'uses' => 'RuanganController@create']);
        Route::post('ruangan', ['as' => 'ruangan.store', 'uses' => 'RuanganController@store']);
        Route::get('ruangan/edit/{id}', ['as' => 'ruangan.edit', 'uses' => 'RuanganController@edit']);
        Route::put('ruangan/edit/{id}', ['as' => 'ruangan.update', 'uses' => 'RuanganController@update']);
        Route::get('ruangan/delete/{id}', ['as' => 'ruangan.delete', 'uses' => 'RuanganController@delete']);

        Route::get('barang', ['as' => 'barang.index', 'uses' => 'BarangController@index']);
        Route::get('barang/create', ['as' => 'barang.create', 'uses' => 'BarangController@create']);
        Route::post('barang', ['as' => 'barang.store', 'uses' => 'BarangController@store']);
        Route::get('barang/edit/{id}', ['as' => 'barang.edit', 'uses' => 'BarangController@edit']);
        Route::put('barang/edit/{id}', ['as' => 'barang.update', 'uses' => 'BarangController@update']);
        Route::get('barang/delete/{id}', ['as' => 'barang.delete', 'uses' => 'BarangController@delete']);
        Route::get('barang/export', ['as' => 'barang.export', 'uses' => 'BarangController@export']);

        Route::get('jurusan', ['as' => 'jurusan.index', 'uses' => 'JurusanController@index']);
        Route::get('jurusan/create', ['as' => 'jurusan.create', 'uses' => 'JurusanController@create']);
        Route::post('jurusan', ['as' => 'jurusan.store', 'uses' => 'JurusanController@store']);
        Route::get('jurusan/edit/{id}', ['as' => 'jurusan.edit', 'uses' => 'JurusanController@edit']);
        Route::put('jurusan/edit/{id}', ['as' => 'jurusan.update', 'uses' => 'JurusanController@update']);
        Route::get('jurusan/delete/{id}', ['as' => 'jurusan.delete', 'uses' => 'JurusanController@delete']);
        Route::get('jurusan/export', ['as' => 'jurusan.export', 'uses' => 'JurusanController@export']);
    });

    Route::get('staffbarang', ['as' => 'staffbarang.index', 'uses' => 'StaffBarangController@index']);
    Route::post('staffbarang', ['as' => 'staffbarang.store', 'uses' => 'StaffBarangController@store']);
    Route::get('staffbarang/edit/{id}', ['as' => 'staffbarang.edit', 'uses' => 'StaffBarangController@edit']);
    Route::put('staffbarang/edit/{id}', ['as' => 'staffbarang.update', 'uses' => 'StaffBarangController@update']);

});

Route::get('/sendemail', 'EmailController@send');

Route::get('/', ['as' => 'auth.signout', 'uses' => 'Auth\loginController@signout']);

Route::get('/dashboard', ['as' => 'dashboard.index', 'uses' => 'DashboardController@index']);