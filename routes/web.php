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


#Route::get('/bodycopy', 'NodeController@bodycopy');


Route::post('/search', 'NodeController@search_post');
Route::get('/search/name/{q}', 'NodeController@search')->name('node.search');
Route::get('/search/{q}', 'NodeController@search_f')->where('q', '[А-Яа-я]+')->name('node.search_f');

Route::get('/node', 'NodeController@index')->name('node.index');
#Route::get('/node/create', 'NodeController@store');
Route::get('/node/{id}', 'NodeController@show')->where('id', '[0-9]+')->name('node.show');
#Route::get('/term/{id}', 'NodeController@term');

#Route::get('updateimage', 'NodeController@updateimage');

Route::get('/', function () {
    return view('main');
});


/*
Auth::routes();


Route::get('/home', 'HomeController@index');
*/
