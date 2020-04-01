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


Route::get('/books','BooksController@indexlaravel');
Route::get('/create/book','BooksController@create');
Route::post('/create/book','BooksController@store');
Route::get('/edit/book/{id}','BooksController@editlaravel');
Route::post('/edit/book/{id}','BooksController@updatelaravel');
Route::post('/delete/book/{id}','BooksController@destroylaravel');