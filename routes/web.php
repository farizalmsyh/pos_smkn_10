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

// SETTING ROUTE
Route::prefix('setting')->group(function(){
    Route::get('/', 'SettingController@index')->name('setting');
    Route::post('u-f/{id}', 'SettingController@update_foto')->name('setting-update-foto');
    Route::post('u-d/{id}', 'SettingController@update_data')->name('setting-update-data');
    Route::post('d/{id}', 'SettingController@delete')->name('setting-delete');
});

// MASTER ROUTE
Route::prefix('master')->group(function(){
    Route::prefix('user')->group(function(){
        Route::get('/', 'Core\Master\UserController@index')->name('user');
        Route::get('c', 'Core\Master\UserController@create')->name('create-user');
        Route::post('s', 'Core\Master\UserController@save')->name('save-user');
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
        Route::get('create', 'Core\Inventory\MasterProdukController@create')->name('master-produk-create');
        Route::post('save', 'Core\Inventory\MasterProdukController@save')->name('master-produk-save');
        Route::get('add-stok/{id}', 'Core\Inventory\MasterProdukController@addStok')->name('master-produk-add-stok');
        Route::post('save-stok/{id}', 'Core\Inventory\MasterProdukController@saveStok')->name('master-produk-save-stok');
        Route::get('edit/{id}', 'Core\Inventory\MasterProdukController@edit')->name('master-produk-edit');
        Route::post('update/{id}', 'Core\Inventory\MasterProdukController@update')->name('master-produk-update');
        Route::get('delete/{id}', 'Core\Inventory\MasterProdukController@delete')->name('master-produk-delete');
    });
    Route::prefix('stok-minimum')->group(function(){
        Route::get('/', 'Core\Inventory\StokMinimumController@index')->name('stok-minimum');
        Route::get('print-all', 'Core\Inventory\StokMinimumController@printAll')->name('stok-minimum-print-all');
        Route::get('print/{kategori}', 'Core\Inventory\StokMinimumController@printKategori')->name('stok-minimum-print-kategori');
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

Route::prefix('report')->group(function(){
    Route::prefix('produk-in')->group(function(){
        Route::get('/', 'Core\Report\ProdukInController@index')->name('produk-in');
        Route::get('print-all', 'Core\Report\ProdukInController@printAll')->name('produk-in-print-all');
        Route::post('print-date', 'Core\Report\ProdukInController@printDate')->name('produk-in-print-date');
    });
    Route::prefix('produk-out')->group(function(){
        Route::get('/', 'Core\Report\ProdukOutController@index')->name('produk-out');
        Route::get('print-all', 'Core\Report\ProdukOutController@printAll')->name('produk-out-print-all');
        Route::post('print-date', 'Core\Report\ProdukOutController@printDate')->name('produk-out-print-date');
    });
    Route::prefix('report-bahan')->group(function(){
        Route::get('/', 'Core\Report\ReportBahanController@index')->name('report-bahan');
        Route::get('c', 'Core\Report\ReportBahanController@create')->name('report-bahan-create');
        Route::post('s', 'Core\Report\ReportBahanController@save')->name('report-bahan-save');
        Route::get('d/{id}', 'Core\Report\ReportBahanController@delete')->name('report-bahan-delete');
        Route::get('print-all', 'Core\Report\ReportBahanController@printAll')->name('report-bahan-print-all');
        Route::get('print-today', 'Core\Report\ReportBahanController@printToday')->name('report-bahan-print-today');
        Route::post('print-date', 'Core\Report\ReportBahanController@printDate')->name('report-bahan-print-date');
    });
});