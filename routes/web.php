<?php

Auth::routes();

Route::group(['middleware' => 'check.empr'], function () {
    Route::get('tabelas', 'TabelaController@index')->name('tabelas');
    Route::get('tabelas/{tabela_id}', 'TabelaController@show')->name('tabelas');
    Route::get('home', 'HomeController@index')->name('home');
});

Route::group(['middleware' => 'is.admin'], function () {
    Route::get('fatura', 'BtiController@report')->name('fatura');
    Route::resource('tabelas', 'TabelaController');
    Route::resource('colunas', 'ColunasController');
    Route::resource('empresa', 'EmpresaController');
    Route::resource('usuarios', 'UsuariosController');
    Route::get('nova-coluna/{tabela_id}', 'ColunasController@novaColuna');
});

Route::get('login', 'BtiController@index')->name('login');
Route::get('/', 'BtiController@index');
Route::post('bti-user', 'BtiController@getEmpresa');
Route::get('erro', 'BtiController@erro')->name('erro');
