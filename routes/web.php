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
use App\User;

Route::get('/', function () {
  return view('welcome');
});
//mostrar perfiles
//mostrar perfil personal 1/4
//formulario datos perfil
//falta middleware personalizado
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');


Route::get('/profiles','ArtistprofileController@index');
Route::get('/profile/create', 'ArtistprofileController@create');
Route::post('/profile/create', 'ArtistprofileController@store');
Route::get('/profile/{Perprof}', 'ArtistprofileController@show');

 
Route::get('/profile/{Perprof}/audios/', 'AudiosController@index');
Route::get('/profile/{Perprof}/videos', 'ArtistprofileController@index');
Route::get('/profile/{Perprof}/events', 'ArtistprofileController@index');
