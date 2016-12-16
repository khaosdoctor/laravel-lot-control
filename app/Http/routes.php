<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', 'ProdutoController@listar');
Route::get('/produto/{id}', 'ProdutoController@detalhe');
Route::post('/produto/{id}', 'ProdutoController@editar');
Route::get('/produto/insert', 'ProdutoController@novo');
Route::post('/produto/insert', 'ProdutoController@inserir');
Route::get('/produto/delete/{id}', 'ProdutoController@remover');

Route::get('/lote/insert/{produto}', 'LoteController@novo');
Route::post('/lote/insert/{produto}/{id}', 'LoteController@inserir');
Route::get('/lote/{id}', 'LoteController@detalhe');
Route::post('/lote/{id}', 'LoteController@editar');
Route::get('/lote/delete/{id}', 'LoteController@remover');