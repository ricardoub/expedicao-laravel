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
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'tarefas', 'as' => 'tarefas.'], function() {
  Route::get('',             ['as' => 'index',   'uses' => 'TarefaController@index']);
  Route::get('create',       ['as' => 'create',  'uses' => 'TarefaController@create']);
  Route::post('store',       ['as' => 'store',   'uses' => 'TarefaController@store']);
  Route::get('show/{id}',    ['as' => 'show',    'uses' => 'TarefaController@show']);
  Route::get('edit/{id}',    ['as' => 'edit',    'uses' => 'TarefaController@edit']);
  Route::post('update/{id}', ['as' => 'update',  'uses' => 'TarefaController@update']);
  Route::get('delete/{id}',  ['as' => 'delete',  'uses' => 'TarefaController@delete']);
  Route::post('destroy/{id}',['as' => 'destroy', 'uses' => 'TarefaController@destroy']);
});
