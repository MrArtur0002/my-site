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

Route::get('/', function () {
    return view('main');
});

Route::get('/about', function () {
  return 'Обо мне страничка';
});

Route::group(
  [
      'prefix' => 'admin',
      'namespace' => 'Admin',
      'as' => 'admin.',
  ],
  function(){
      Route::get('/',['as' => 'dashboard','uses' => 'DashboardController@show']);
  }
);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
