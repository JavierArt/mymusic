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
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

//profiles
Route::get('/profiles','ArtistprofileController@index');
Route::get('/profile/create', 'ArtistprofileController@create');
Route::post('/profile/s', 'ArtistprofileController@store');
Route::get('/profile/{Perprof}', 'ArtistprofileController@show');
Route::get('/profile/{Perprof}/edit', 'ArtistprofileController@edit');
Route::put('/profile/{Perprof}', 'ArtistprofileController@update');//fix
Route::get('/profile/{Perprof}/self','ArtistprofileController@own');
Route::post('/profilepic','ArtistprofileController@updateavatar');
Route::get('profiles/searchredirect', function(){     
    /* Nuevo: si el argumento search está vacío regresar a la página anterior */
    if (empty(Request::get('search'))) return redirect()->back();
    
    $search = urlencode(e(Request::get('search')));
    $route = "/profiles/$search";
    return redirect($route);
});
Route::get("/profiles/{search}", "ArtistprofileController@search");
Route::get("/profiles/mayores/18","ArtistprofileController@mayorfirst");
Route::get("/profiles/banda/s","ArtistprofileController@bandas");
Route::get("/profiles/solista/s","ArtistprofileController@solistas");
Route::get("/profiles/dj/s","ArtistprofileController@DJS");


//videos
Route::get('/profile/{Perprof}/videos', 'VideosController@videosfromprofile');
Route::get('/profile/{Perprof}/{id}/videos', 'VideosController@videosfromprofile');
Route::resource('video', 'VideosController', ['only' => ['store', 'destroy']]);//fix destroy

//events
Route::get('/profile/{Perprof}/events', 'FutureventsController@index');
Route::get('/profile/{Perprof}/events/create','FutureventsController@create');
Route::post('/profile/{Perprof}/events', 'FutureventsController@store');

//audios
Route::get('/profile/{Perprof}/audios','AudiosController@audiosfromprofile');
Route::get('/profile/{Perprof}/{id}/audios','AudiosController@audiosfromprofile');
Route::resource('audios', 'AudiosController', ['only' => ['store', 'destroy']]);//fix destroy

//pictures
Route::get('/profile/{Perprof}/pictures','PicturesController@picsfromprofile');
Route::get('/profile/{Perprof}/{id}/pictures','PicturesController@picsfromprofile');
Route::resource('pictures', 'PicturesController', ['only' => ['store', 'destroy']]);//fix destroy