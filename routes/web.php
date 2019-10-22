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

Route::get('/', [
    'uses'=>'IteamController@new',

]);


Route::get('/registation', [
    'uses'=>'UserController@registation',
'as'=>'registation'
]);



Route::post('submit', [
    'uses'=>'UserController@submit',
'as'=>'submit'
]);

Route::get('/login', [
    'uses'=>'UserController@login',
'as'=>'login'
]);

Route::post('loginform', [
    'uses'=>'UserController@loginform',
'as'=>'loginform'
]);


Route::get('backend', [
    'uses'=>'UserController@backend'

]);

Route::get('logout', [
    'uses'=>'UserController@logout',
    'as'=>'logout'

]);



Route::get('/user/{id}', 'UserController@user')->name('user');

Route::get('/home/{id}', 'UserController@home')->name('home');

Route::get('/active/{id}', 'UserController@active')->name('active');

Route::get('/inactive/{id}', 'UserController@inactive')->name('inactive');

Route::get('/editpage/{id}', 'UserController@editpage')->name('editpage');


Route::post('edit', [
    'uses'=>'UserController@edit',
'as'=>'edit'
]);

Route::get('/iteam/{id}', 'UserController@iteam')->name('iteam');

Route::post('iteamadd', [
    'uses'=>'IteamController@iteamadd',
'as'=>'iteamadd'
]);

Route::get('/iteaminactive/{id}', 'IteamController@inactive')->name('iteaminactive');

Route::get('/iteamactive/{id}', 'IteamController@active')->name('iteamactive');

Route::get('update/{id}{iteam}', 'IteamController@update')->name('update');

Route::post('iteamupdate', [
    'uses'=>'IteamController@iteamupdate',
'as'=>'iteamupdate'
]);


Route::get('order/{id}{iteam}', 'IteamController@order')->name('order');

Route::post('orderadd', [
    'uses'=>'OrderController@order',
'as'=>'orderadd'
]);

Route::get('orderhistory/{id}', 'OrderController@orderhistory')->name('orderhistory');


Route::get('/reciver/{id}', 'OrderController@reciver')->name('reciver');


Route::get('/complaine/{id}', 'ComplaineController@complaine')->name('complaine');

Route::post('complaineadd', [
    'uses'=>'ComplaineController@compalineadd',
'as'=>'complaineadd'
]);


Route::get('/complaineshow/{id}', 'ComplaineController@complaineshow')->name('complaineshows');

Route::get('ordershow/{id}', 'OrderController@ordershow')->name('ordershow');
