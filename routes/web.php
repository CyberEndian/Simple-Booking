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

/*Route::get('/', function () {
    return view('welcome');
	
});
*/

//Route::get('/home', 'HomeController@index');

Route::get('pending', 'BrokerController@getPending');
Route::post('approve', 'BrokerController@doApprove')->name('approve');


//Route::post('login', array('uses' => 'Controller@doApprove'));


Route::get('datatable', ['uses'=>'CustomerController@datatable']);
Route::get('datatable/getposts', ['as'=>'datatable.getposts','uses'=>'CustomerController@getPosts']);
Route::get('hotels', ['uses'=>'BrokerController@getHotels']);

Route::get('bookings', 'OwnerController@getBookings');
Route::post('owed', 'OwnerController@owed')->name('owed');




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');
