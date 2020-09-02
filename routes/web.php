<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ContactController@index')->name('index');
Route::get('/contact/create', 'ContactController@create')->name('create');
Route::post('/contact/store', 'ContactController@store')->name('store');
Route::get('/contact/{contactId}', 'ContactController@show')->name('show');
Route::get('/contact/{contactId}/edit', 'ContactController@edit')->name('edit');
Route::patch('/contact/{contactId}/update', 'ContactController@update')->name('update');
Route::delete('/contact/{contactId}/destroy', 'ContactController@destroy')->name('destroy');

Route::get('comment/', 'CommentController@index')->name('comment.index');
Route::get('/comment/create', 'CommentController@create')->name('comment.create');
Route::post('/comment/store', 'CommentController@store')->name('comment.store');
Route::get('/comment/{commentId}', 'CommentController@show')->name('comment.show');
Route::get('/comment/{commentId}/edit', 'CommentController@edit')->name('comment.edit');
Route::patch('/comment/{commentId}/update', 'CommentController@update')->name('comment.update');
Route::delete('/comment/{commentId}/destroy', 'CommentController@destroy')->name('comment.destroy');
