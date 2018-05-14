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
Route::post('/profile', 'ArtistprofileController@store');
Route::get('/profile/{Perprof}', 'ArtistprofileController@show');
Route::get('/profile/{Perprof}/edit', 'ArtistprofileController@edit');
Route::post('/profile/{Perprof}/edit', 'ArtistprofileController@update');

//Route::resource('profiles', 'ArtistprofileController');
/*
Route::put('/profile/{Perprof}', 'ArtistprofileController@update');
Route::resource('artistprofile', 'ArtistprofileController', ['only' => ['destroy']]);
 
Route::get('/profile/{Perprof}/audios/', 'AudiosController@index');
Route::get('/profile/{Perprof}/videos', 'ArtistprofileController@index');
Route::get('/profile/{Perprof}/events', 'ArtistprofileController@index');

Route::get('/profile/{Perprof}/audios/descarga/{archivo}', 'AudiosController@descarga')->name('descarga');
Route::resource('archivo', 'AudiosController', ['only' => ['store', 'destroy']]);

Route::get('/profile/{Perprof}/videos/descarga/{archivo}', 'VideosController@descarga')->name('descarga');
Route::resource('archivo', 'VideosController', ['only' => ['store', 'destroy']]);
**/
/*Route::get('/profile/{Perprof}/events','FutureventsController@index');
Route::get('/profile/{Perprof}/events/create','FutureventsController@create');
Route::post('/profile/{Perprof}/events','FutureventsController@store');
**/
//luego lo muestro y subo
Route::get('/profile/{Perprof}/audios','AudiosController@index');
Route::get('/profile/{Perprof}/audios/create','AudiosController@create');
Route::get('descarga/{archivo}', 'AudiosController@descarga')->name('descarga');
Route::resource('audios', 'AudiosController', ['only' => ['store', 'destroy']]);
//Route::post('profile/{Perprof}/audios/create', 'AudiosController@store');
//Route::post('archivo/{Perprof}', 'AudiosController@destroy');


