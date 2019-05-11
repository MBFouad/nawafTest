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
/******************************************  Home Routes Start  ******************************************/
Route::get('/', ['uses' => 'WebHomeController@index', 'as' => 'webHomeIndex']);
/******************************************  Home Routes End  ******************************************/

