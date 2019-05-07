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

Route::get('/node/noPublic', 'NodeController@noPublic')->name('node.noPublic')->middleware('auth');
Route::get('/node/{id}/delete', 'NodeController@delete')->name('node.delete')->middleware('auth');

Route::get('/gallery', 'NodeController@gallery')->name('gallery.index');

Route::get('/term', 'NodeController@list_tt')->name('tt.index')->middleware('auth');
Route::get('/json/term', 'NodeController@show_tt')->name('tt.show')->middleware('auth');
Route::post('/json/term', 'NodeController@update_tt')->name('tt.update')->middleware('auth');
Route::delete('/json/term', 'NodeController@delete_tt')->name('tt.delete')->middleware('auth');

Route::get('/term/{id}', 'NodeController@term')->name('term.show');
Route::get('/voc/{id}', 'NodeController@voc')->name('term.voc');

Route::get('/admin', 'AdminController@index')->name('admin.index');
Route::get('/admin/{id}', 'AdminController@edit')->where('id', '[0-9]+')->name('admin.edit');
Route::post('/admin/{id}', 'AdminController@update')->where('id', '[0-9]+')->name('admin.update');
Route::post('/admin', 'AdminController@store')->name('admin.store');

Route::get('/', function () {
	return view('main');
})->name('main');


Route::get('/getlast', function () {
	$data = \App\Node::where('id', '>', 4362)->get();
	return $data->pluck('id', 'title');
});

Auth::routes();
Route::any('register', function () {return abort('404');});
Route::any('password', function () {return abort('404');});
Route::any('password/reset', function () {return abort('404');});
Route::any('password/email', function () {return abort('404');});