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
//Login
Route::get('/login', [
    'as'=>'login.index',
    'uses'=>'Login@index'
]);
Route::post('/login/auth', [
    'as'=>'login.auth',
    'uses'=>'Login@auth'
]);
Route::get('/logout', [
    'as'=>'login.logout',
    'uses'=>'Login@logout'
]);
//
Route::get('/index', [
    'as'=>'master.index',
    'uses'=>'MasterController@index'
]);
Route::get('/index_user', [
    'as'=>'master.index_user',
    'uses'=>'MasterController@index_user'
]);
Route::get('/edit_user/{$id}', [
    'as'=>'master.edituser',
    'uses'=>'MasterController@edit'
]);
Route::post('/index_user/store', [
    'as'=>'master.store',
    'uses'=>'MasterController@store'
]);
Route::post('/index_user/update', [
    'as'=>'master.update',
    'uses'=>'MasterController@update'
]);
Route::delete('/index_user/delete/{$id}', [
    'as'=>'master.delete',
    'uses'=>'MasterController@delete'
]);
Route::get('/index_user/edit/{id}', 'MasterController@edit');
Route::get('/index_user/destroy/{id}', 'MasterController@destroy');
////MESIN
Route::get('/mesin', [
    'as'=>'mesin.index',
    'uses'=>'MasterMesinController@index'
]);
Route::post('/mesin/store', [
    'as'=>'mesin.store',
    'uses'=>'MasterMesinController@store'
]);
Route::get('/mesin/edit/{$id}', [
    'as'=>'mesin.edit',
    'uses'=>'MasterMesinController@edit'
]);
Route::post('/mesin/update', [
    'as'=>'mesin.update',
    'uses'=>'MasterMesinController@update'
]);
Route::get('/mesin/destroy/{id}', 'MasterMesinController@destroy');
////PRODUK
Route::resource('Produk', 'MasterProdukController');
Route::get('/produk', [
    'as'=>'produk.index',
    'uses'=>'MasterProdukController@index'
]);
Route::post('produk/store', [
    'as'=>'produk.store',
    'uses'=>'MasterProdukController@store'
]);
Route::get('/produk/edit/{$id}', [
    'as'=>'produk.edit',
    'uses'=>'MasterProdukController@edit'
]);
Route::post('/produk/update', [
    'as'=>'produk.update',
    'uses'=>'MasterProdukController@update'
]);
Route::get('/produk/destroy/{id}', 'MasterProdukController@destroy');
//INPUT OEE
Route::resource('OEE', 'MasterOEEController');
Route::get('/oee', [
    'as'=>'oee.index',
    'uses'=>'MasterOEEController@index'
]);
Route::post('oee/store', [
    'as'=>'oee.store',
    'uses'=>'MasterOEEController@store'
]);
Route::post('/oee/update', [
    'as'=>'oee.update',
    'uses'=>'MasterOEEController@update'
]);
Route::get('/oee/edit/{$id}', [
    'as'=>'oee.edit',
    'uses'=>'MasterOEEController@edit'
]);
Route::get('/oee/destroy/{id}', 'MasterOEEController@destroy');
////NILAI
Route::resource('Nilai', 'NilaiOEEController');
Route::get('/nilai/{id?}', [
    'as'=>'nilai.index',
    'uses'=>'NilaiOEEController@index'
]);
Route::get('/oee_chart', [
    'as'=>'nilai.oee',
    'uses'=>'NilaiOEEController@oee_chart'
]);


//NOTIFph
Route::get('/pesan','NotifController@index');
Route::get('/pesan/sukses','NotifController@sukses');
Route::get('/pesan/peringatan','NotifController@peringatan');
Route::get('/pesan/gagal','NotifController@gagal');