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
//mostrar perfil personal 3/4
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//profiles
Route::get('/profiles','ArtistprofileController@index');
Route::get('/profile/create', 'ArtistprofileController@create');
Route::post('/profile/s', 'ArtistprofileController@store');
Route::get('/profile/{Perprof}', 'ArtistprofileController@show');
Route::get('/profile/{Perprof}/edit', 'ArtistprofileController@edit');
Route::post('/profile/{Perprof}/edit', 'ArtistprofileController@update');//fix
Route::resource('profileD', 'ArtistprofileController', ['only' => ['destroy']]);

//videos
Route::get('/profile/{Perprof}/videos', 'VideosController@videosfromprofile');
Route::get('/profile/{Perprof}/videos/create', 'VideosController@create');
Route::get('descarga/{archivo}', 'VideosController@descarga')->name('descarga');//fix
Route::resource('video', 'VideosController', ['only' => ['store', 'destroy']]);//fix destroy

//events
Route::get('/profile/{Perprof}/events', 'FutureventsController@index');
Route::get('/profile/{Perprof}/events/create','FutureventsController@create');
Route::post('/profile/{Perprof}/events', 'FutureventsController@store');

//audios
Route::get('/profile/{Perprof}/audios','AudiosController@audiosfromprofile');
Route::get('/profile/{Perprof}/audios/create','AudiosController@create');
Route::get('descarga/{archivo}', 'AudiosController@descarga')->name('descarga');//fix
Route::resource('audio', 'AudiosController', ['only' => ['store', 'destroy']]);//fix destroy

