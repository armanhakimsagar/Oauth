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

Route::get('/auth','ApiController@index');
Route::post('/loginCheck','ApiController@loginCheck');
Route::get('/loginCheck','ApiController@loginCheck');
Route::get('/grant_permission','ApiController@grantPermission');
Route::get('/token_response','ApiController@TokenResponse');