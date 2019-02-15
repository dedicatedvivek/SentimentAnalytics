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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/keyword_entry', function () {
    return view('keyword_entry');
});

Route::get('/keyword_registry', function () {
    return view('keyword_registry');
});


Route::post("/insert_keyword","KeywordsController@insert_keyword");
Route::post("/delete_keyword","KeywordsController@delete_keyword");
