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
Route::get('/produto/{id}', 'ProdutoController@detalhe')->where('id', '[0-9]+');
Route::post('/produto/{id}', 'ProdutoController@editar');
Route::get('/produto/novo', 'ProdutoController@novo');
Route::post('/produto/novo', 'ProdutoController@inserir');
Route::get('/produto/delete/{id}', 'ProdutoController@remover')->where('id', '[0-9]+');

Route::get('/lote/novo/{produto}', 'LoteController@novo')->where('produto', '[0-9]+');
Route::post('/lote/novo/{produto}/{id}', 'LoteController@inserir')->where('produto', '[0-9]+')->where('id', '[0-9]+');;
Route::get('/lote/{id}', 'LoteController@detalhe')->where('id', '[0-9]+');
Route::post('/lote/{id}', 'LoteController@editar')->where('id', '[0-9]+');
Route::get('/lote/delete/{id}', 'LoteController@remover')->where('id', '[0-9]+');