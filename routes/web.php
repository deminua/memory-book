<?php

Route::post('/search', 'NodeController@search_post');
Route::get('/search/name/{q}', 'NodeController@search')->name('node.search');
Route::get('/search/{q}', 'NodeController@search_f')->where('q', '[А-Яа-я]+')->name('node.search_f');

Route::get('/node', 'NodeController@index')->name('node.index');
Route::get('/node/create', 'NodeController@create')->name('node.create');
Route::post('/node/create', 'NodeController@store')->name('node.store');
Route::get('/node/{id}', 'NodeController@show')->where('id', '[0-9]+')->name('node.show');
Route::get('/node/{id}/edit', 'NodeController@edit')->where('id', '[0-9]+')->name('node.edit')->middleware('auth');
Route::post('/node/{id}/edit', 'NodeController@update')->where('id', '[0-9]+')->name('node.update')->middleware('auth');

Route::get('/gallery', 'NodeController@gallery')->name('gallery.index');

Route::get('/term/{id}', 'NodeController@term')->name('term.show');

Route::get('/', function () {
    return view('main');
})->name('main');

Auth::routes();
Route::any('register', function () { return abort('404'); });
Route::any('password', function () { return abort('404'); });
Route::any('password/reset', function () { return abort('404'); });
Route::any('password/email', function () { return abort('404'); });