<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@index')->name('bti');

Route::get('/fatura', 'BtiController@report')->name('fatura');
Route::post('/bti-user', 'BtiController@usuario_empresa');
Route::get('/', 'BtiController@index')->name('bti');

Route::resource('produto', 'ProdutoController');
Route::resource('tabelas', 'TabelaController');
Route::resource('colunas', 'ColunasController');
Route::resource('cliente', 'ClienteController');

Route::get('nova-coluna/{tabela_id}', 'ColunasController@novaColuna');