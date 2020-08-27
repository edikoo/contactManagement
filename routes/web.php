<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'ContactController@index')->name('index');
Route::get('/contact/create', 'ContactController@create')->name('create');
Route::post('/contact/store', 'ContactController@store')->name('store');
Route::get('/contact/{contactId}', 'ContactController@show')->name('show');
Route::get('/contact/{contactId}/edit', 'ContactController@edit')->name('edit');
Route::patch('/contact/{contactId}/update', 'ContactController@update')->name('update');
Route::delete('/contact/{contactId}/delete', 'ContactController@delete')->name('delete');


//We Can Use resource to avoid all of these routes
