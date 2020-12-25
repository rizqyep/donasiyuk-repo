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

Route::get('/', 'HomeController@index');

Route::get('/register/options','Auth\RegisterController@options');
Route::get('/register/orphanage','Auth\RegisterController@orphanage');
Route::get('/register/user','Auth\RegisterController@user');
Route::get('/login/options','Auth\LoginController@options');
Route::get('/login/options','Auth\LoginController@options');
Route::get('/login/orphanage','Auth\LoginController@orphanage');
Route::get('/login/user','Auth\LoginController@user');
Route::get('/aboutus','HomeController@aboutus');

Auth::routes();

Route::get('/orphanage','Orphanage\HomeController@index');
Route::post('/orphanage/gallery','Orphanage\ProfileController@gallery');
Route::get('/orphanage/donations','Orphanage\DonationController@index');
Route::put('/orphanage/{orphanage}','Orphanage\ProfileController@update');


Route::get('/orphanages','Orphanage\DataController@index');
Route::get('/orphanages/{slug}','Orphanage\DataController@show');


Route::post('/transaction','Orphanage\TransactionController@create');

Route::get('/payment/instruction/{payment_token}/{payment_slug}/{orphanage_slug}/{transaction}','PaymentController@show');
Route::get('/payment/complete','PaymentController@complete');
Route::post('/payment/','PaymentController@create');


Route::get('/profile','ProfileController@index');
Route::put('/profile','ProfileController@update');
