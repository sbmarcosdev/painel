<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/fatura', 'BtiController@report')->name('fatura');
Route::post('/bti-user', 'BtiController@usuario_empresa');
Route::get('/', 'BtiController@index')->name('bti');

Route::resource('produto', 'ProdutoController');