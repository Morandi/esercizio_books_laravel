<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('libri')->group(function(){
    Route::get('/elencoLibri','BooksController@index');
    Route::post('/aggiornaLibro','BooksController@update');
    Route::post('/eliminaLibro/{id}','BooksController@destroy');
    // Route::post('/delete/book/{id}','BooksController@destroy');
});