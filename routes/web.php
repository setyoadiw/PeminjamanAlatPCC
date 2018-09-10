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



Route::get('/', function () {
    return redirect()->action(
        'PeminjamanController@index'
        );
});


Route::get('/lihatpeminjaman','PeminjamanController@show');
Route::get('/dataalat','PeminjamanController@alat');

Route::post('/lihatpeminjaman/{id}/kembali','PeminjamanController@kembali');
Route::resource('/dataalat', 'DataAlatController')->only([
    'update', 'destroy'
]);
Route::post('/dataalat/add','DataAlatController@store');


// Route::post('/dataalat/add','PeminjamanController@add');

Route::resource('/peminjaman','PeminjamanController');






Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
