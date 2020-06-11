<?php
use Illuminate\Support\Facades\Route;

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
//Route::get('/', function () {
  // return view('welcome');
//});
Route::get('/', 'HomeController');
//PREFIX E GROUP PARA CRUD
Route::prefix('/tarefas')->group(function() {
    Route::get('/', 'TarefasController@list');
    Route::get('add', 'TarefasController@add');
    Route::post('add', 'TarefasController@addAction');
    Route::get('edit/{id}', 'TarefasController@edit');
    Route::post('edit/{id}', 'TarefasController@editAction');
    Route::get('delete/{id}', 'TarefasController@del');
    Route::get('marcar/{id}', 'TarefasController@done');
});

Route::prefix('/config')->group(function(){
    Route::get('/', 'Admin\ConfigController@index');
    Route::post('/', 'Admin\ConfigController@index');

    Route::get('info', 'Admin\ConfigController@info');
    Route::get('permissoes', 'Admin\ConfigController@permissoes');
});
Route::fallback(function(){
    return view('404');
});


