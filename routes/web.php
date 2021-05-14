<?php

Auth::routes();

Route::group(['middleware' => 'check.empr'], function () {

    Route::get('home', 'HomeController@index');
    Route::get('tabelas', 'TabelaController@index');
    Route::get('tabelas/{tabela_id}', 'TabelaController@show');
    Route::get('tab-ajax/{tabela_id}', 'TabAjaxController@show');

});

Route::group(['middleware' => 'is.admin'], function () {

    Route::get('nova-tabela/create', 'TabelaController@create');
    Route::get('tabelas/{tabela_id}/edit', 'TabelaController@edit');
    Route::post('tabelas', 'TabelaController@store');
    Route::patch('tabelas/{tabela_id}', 'TabelaController@update');
    Route::delete('tabelas/{tabela_id}', 'TabelaController@destroy');

    Route::resource('colunas', 'ColunasController');
    Route::resource('empresa', 'EmpresaController');
    Route::resource('usuarios', 'UsuariosController');
    Route::get('nova-coluna/{tabela_id}', 'ColunasController@novaColuna');
});

Route::get('tabs-empresa/{empresa_id}', 'TabAjaxController@index');
Route::get('/', 'BtiController@index');
Route::get('login', 'BtiController@index')->name('login');
Route::post('bti-user', 'BtiController@getEmpresa');
Route::get('erro', 'BtiController@erro')->name('erro');
