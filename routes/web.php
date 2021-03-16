<?php

Route::get('/', 'HomeController@index');
Auth::routes();

Route::get('/home', 'HomeController@home');
Route::post( '/novoproduto', 'HomeController@novoproduto' );
Route::post( '/savecupom', 'HomeController@savecupom' );
Route::post( '/atualizar', 'HomeController@atualizar' );
Route::get('/deletar', 'HomeController@deletar');

Auth::routes();

