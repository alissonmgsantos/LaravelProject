<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});


Route::group(['prefix'=>'produtos'], function(){
    Route::post('cadastrar', 'ProdutoController@cadastrar');
    Route::get('/', 'ProdutoController@listar');
    Route::get('deletar/{id}', 'ProdutoController@deletar')->where('id','[0-9]+');
    Route::get('detalhes/{id}', 'ProdutoController@detalhes')->where('id','[0-9]+');

});
    

