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

Route::get('/profile/', function () {
  //no van a ser usuarios  si no datos de perfiles acomodades de forma bonita
  $profile = DB::table('users')->get();
  return view('profiles.profilec', compact('profile'));
});

Route::get('/profile/{id}', function ($id) {
  //no van a ser usuarios  si no datos de perfiles acomodades de forma bonita
  $profile = DB::table('users')->find($id);
  return view('profiles.profile', compact('profile'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
