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

//Route::get('/', function () {
//    return view('welcome');
//});



Route::pattern('page', '[0-9]+');
Route::pattern('date', '\d{4}/\d{2}/\d{2}');
Route::pattern('slug', '[0-9A-Za-z_-]+');
Route::pattern('maincat', '(citta|post)');

//Route::get('/', 'WelcomeController@index');
Route::get('/{page?}', array('as'=> 'home','uses'=>'WelcomeController@index'));

Route::get('home', 'HomeController@index');

//cookie
Route::get('/cookie-policy', array('as'=> 'cookie','uses'=>'WelcomeController@cookie'));
Route::get('/cookie-policy/modal', array('as'=> 'cookie_modal','uses'=>'WelcomeController@cookie_modal'));


//
//Route::controllers([
//	'auth' => 'Auth\AuthController',
//	'password' => 'Auth\PasswordController',
//]);
//


//articoli

Route::get('{maincat}/{page?}', array('as' => 'posts.list', 'uses' => 'PostsController@showList'));
Route::get('{maincat}/{slug}/{page?}', array('as' => 'posts.page', 'uses' => 'PostsController@showPost'));

//rating
Route::post('/ajax/rate/{entity}/{id}', 'RateController@rate');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
