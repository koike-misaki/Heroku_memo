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

Route::get('memo', 'MemoController@open');
Route::get('memo/index', 'MemoController@index')->middleware('auth');
Route::post('memo/index', 'MemoController@date')->middleware('auth');
Route::get('memo/create', 'MemoController@create')->middleware('auth');
Route::post('memo/create', 'MemoController@store')->middleware('auth');
Route::post('memo/exit', 'MemoController@exit')->middleware('auth');
Route::get('memo/all', 'MemoController@all')->middleware('auth');
Route::get('memo/detail', 'MemoController@detail')->middleware('auth');
Route::get('memo/delete', 'MemoController@delete')->middleware('auth');
Route::get('memo/detail_delete', 'MemoController@detail_delete')->middleware('auth');
Route::get('memo/edit', 'MemoController@edit')->middleware('auth');
Route::post('memo/edit', 'MemoController@update')->middleware('auth');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
