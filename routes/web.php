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

Route::get('/', 'TaskController@index');
Route::post('/taskCreate', 'TaskController@add');
Route::post('/taskComplete/{id}', 'TaskController@complete');
Route::post('/taskDelete/{id}', 'TaskController@delete');

