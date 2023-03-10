<?php

use Illuminate\Support\Facades\Auth;
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



Route::get('/Admin', 'tampilan_controller@dashboard');

// Supplier
Route::get('/supplier','supplier_controller@supplier');
Route::get('/supplier/input','supplier_controller@form');
Route::post('/supplier/tambah','supplier_controller@input_supplier');
// Supplier

// Bahan Baku
Route::get('/Detail/Pembelian','pembelian_controller@view_pembelian');
Route::get('/Master/Bahan','Controller_BahanBaku@master');
Route::get('/form/bahan','Controller_BahanBaku@form_input');
Route::post('/input/bahan','Controller_BahanBaku@simpan');
Route::get('/ambil/bahan/{id}','Controller_BahanBaku@ambil');
Route::post('/update/bahan','Controller_BahanBaku@update');
Route::get('/delete/bahan/{id}','Controller_BahanBaku@delete');
// Bahan Baku

// Produk
Route::get('/Master/Produk','Controller_Produk@master');
Route::get('/form/produk','Controller_Produk@form_input');
Route::post('/input/produk','Controller_Produk@simpan');
Route::get('/produk/{id}','Controller_Produk@ambil');
Route::post('/update/produk','Controller_Produk@update');
Route::get('/delete/produk/{id}','Controller_Produk@delete');
// Produk

// Produksi
Route::get('/produksi/produk/{id}','produksi_controller@formProduksi');
Route::post('/input/produksi','produksi_controller@simpan');
// Produksi

// BOM
Route::get('/form/bom','Controller_BOM@form_input');
Route::post('/input/bom','Controller_BOM@simpan');
// BOM

// Home
Route::get('/Home','tampilan_controller@index');
Route::get('/Product','tampilan_controller@produk');
Route::get('/About','tampilan_controller@about');
Route::get('/Location','tampilan_controller@lokasi');
// Home

// Pembelian
Route::get('/pembelian','pembelian_controller@form_pembelian');
Route::post('/input/pembelian','pembelian_controller@simpan');
// Pembelian

// Front End Pesanan
Route::get('/detail/{id}','tampilan_controller@ambil');
Route::get('/pesan/{id}','penjualan_controller@form_pesan');
Route::post('/input/pesanan','penjualan_controller@simpan');
Route::get('/konfirmasi/pesanan','rincian_jual_controller@konfirmasi');
Route::post('/konfirmasi','rincian_jual_controller@fixBayar');
Route::get('/cart','tampilan_controller@cart');
// Front End Pesanan

// Order 
Route::get('/Order','Controller_order@detail_order');
Route::get('/bayar/{id}','Controller_order@bayar');
Route::post('/produksi/selesai','Controller_order@produksi');
Route::get('/selesai/{id}','Controller_order@selesai');
Route::get('/terima/{id}','Controller_order@terima');
// Order

// Laporan 
Route::get('/Laporan','laporan_controller@laporan');
Route::get('/Laporan/Detail/{tgl}','laporan_controller@detail_laporan');
// Laporan


Auth::routes();

Route::get('/', 'HomeController@index');

