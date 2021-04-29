<?php

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/', 'HomeController@index')->name('bti');

Route::get('/fatura', 'BtiController@report')->name('fatura');
Route::post('/bti-user', 'BtiController@getEmpresa');

Route::get('/login', 'BtiController@index')->name('login');

Route::get('/', 'BtiController@index');
Route::get('erro', 'BtiController@erro')->name('erro');

Route::resource('produto', 'ProdutoController');
Route::resource('tabelas', 'TabelaController');
Route::resource('colunas', 'ColunasController');
Route::resource('cliente', 'ClienteController');
Route::resource('usuarios', 'UsuariosController');

Route::get('nova-coluna/{tabela_id}', 'ColunasController@novaColuna');
