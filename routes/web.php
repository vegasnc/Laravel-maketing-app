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

Route::get('/', 'AuthController@showLogin')->name('login.show');
Route::get('login', 'AuthController@showLogin')->name('login');
Route::post('login', 'AuthController@login');
Route::get('register', 'AuthController@showRegister')->name('register');
Route::post('register', 'AuthController@register');

Route::group(['middleware' => 'auth'], function() {
	// ------ DASHBOARD HOME -------
	Route::get('administrator/home', 'HomeController@index')->name('home');
	Route::get('member/home', 'HomeController@member')->name('member');
	Route::get('logout', 'AuthController@logout')->name('logout');

	// ------ DATA BARANG ADMIN ----------
	Route::get('administrator/barang/barang', 'BarangController@index')->name('barang.index');
	Route::post('administrator/barang/create', 'BarangController@store')->name('barang.store');
	Route::get('administrator/barang/{id}/update/', 'BarangController@edit');
	Route::post('administrator/barang/update/', 'BarangController@update')->name('barang.update');
	Route::get('administrator/barang/delete/{id}/data', 'BarangController@destroy')->name('barang.delete');

	// ------ DATA MEMBER ADMIN ----------
	Route::get('administrator/member/member', 'MemberController@index')->name('member.index');
	Route::post('administrator/member/store', 'MemberController@store')->name('member.store');

	// ------ DATA PAYOUTS ADMIN ----------
	Route::get('administrator/payouts/payouts', 'PayoutController@index')->name('payouts.index');
	Route::get('administrator/payouts/create', 'PayoutController@create')->name('payouts.create');
	Route::post('administrator/payouts/store', 'PayoutController@store')->name('payouts.store');

	// ------ DATA PERHITUNGAN GROWTH ADMIN ----------
	Route::get('administrator/growth/growth', 'GrowthController@index')->name('growth.index');
});


// Route::get('/', 'ProdukController@produk');