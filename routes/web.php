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
Auth::routes(['register' => false]);

Route::get('/', 'HomeController@welcome')->name('welcome');
Route::get('/home', 'HomeController@index')->name('home');

// Route::prefix('setting', function(){
//     Route::get('/', 'SettingController@index')->name('setting');
//     Route::post('u-f/{id}', 'SettingController@update_foto')->name('seting-update-foto');
//     Route::post('u-d/{id}', 'SettingController@update_data')->name('seting-update-data');
//     Route::get('d/{id}', 'SettingController@delete')->name('seting-delete');
// });
// SETTING ROUTE
Route::get('setting', 'SettingController@index')->name('setting');

// MASTER ROUTE
Route::prefix('master')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('/', 'Core\Master\UserController@index')->name('user');
        Route::get('c', 'Core\Master\UserController@create')->name('create-user');
        Route::post('s', 'Core\Master\UserController@save')->name('save-user');
        // Route::get('e/{id}', 'Core\Master\UserController@edit')->name('edit-user');
        // Route::post('u/{id}', 'Core\Master\UserController@update')->name('update-user');
        Route::get('d/{id}', 'Core\Master\UserController@delete')->name('delete-user');
    });
    Route::prefix('profil')->group(function(){
    	Route::get('/', 'Core\Master\ProfilController@index')->name('profil');
        Route::get('c', 'Core\Master\ProfilController@create')->name('create-profil');
        Route::post('s', 'Core\Master\ProfilController@save')->name('save-profil');
        Route::get('e/{id}', 'Core\Master\ProfilController@edit')->name('edit-profil');
        Route::post('u/{id}', 'Core\Master\ProfilController@update')->name('update-profil');
        Route::get('d/{id}', 'Core\Master\ProfilController@delete')->name('delete-profil');
    });
});

Route::prefix('inventory')->group(function(){
    Route::prefix('master-produk')->group(function(){
        Route::get('/', 'Core\Inventory\MasterProdukController@index')->name('master-produk');
    });
    Route::prefix('master-konfigurasi')->group(function(){
        Route::get('/', 'Core\Inventory\MasterKonfigurasi@index')->name('master-konfigurasi');
        Route::post('save-curr', 'Core\Inventory\MasterKonfigurasi@saveCurr')->name('save-curr');
        Route::get('delete-curr/{id}', 'Core\Inventory\MasterKonfigurasi@deleteCurr')->name('delete-curr');
        Route::post('save-kategori', 'Core\Inventory\MasterKonfigurasi@saveKategori')->name('save-kategori');
        Route::get('delete-kategori/{id}', 'Core\Inventory\MasterKonfigurasi@deleteKategori')->name('delete-kategori');
        Route::post('save-unit', 'Core\Inventory\MasterKonfigurasi@saveUnit')->name('save-unit');
        Route::get('delete-unit/{id}', 'Core\Inventory\MasterKonfigurasi@deleteUnit')->name('delete-unit');
        Route::post('save-or-update-stok-minimum', 'Core\Inventory\MasterKonfigurasi@SaveOrUpdatePPNStok')->name('save-or-update-ppn-stok');
        Route::post('save-or-update-ppn', 'Core\Inventory\MasterKonfigurasi@SaveOrUpdatePPN')->name('save-or-update-ppn');
        Route::post('save-bahan', 'Core\Inventory\MasterKonfigurasi@saveBahan')->name('save-bahan');
        Route::get('delete-bahan/{id}', 'Core\Inventory\MasterKonfigurasi@deleteBahan')->name('delete-bahan');
        Route::post('save-persen', 'Core\Inventory\MasterKonfigurasi@savePersen')->name('save-persen');
        Route::get('delete-persen/{id}', 'Core\Inventory\MasterKonfigurasi@deletePersen')->name('delete-persen');
    });
});