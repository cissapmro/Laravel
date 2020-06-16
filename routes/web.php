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
/*Route::resource('todo', 'TodoController');
GET - /todo - index - todo.index - LISTA OS ITENS
GET - /todo/create - create - todo.create - FORM DE CRIAÇÃO
POST - /todo - store - todo.store - RECEBER OS DADOS E ADD ITEM
GET - /todo/{id} - show - todo.show - ITEM INDIVIDUAL
GET /todo/{id}/edit - edit - todo.edit  - FORM DE EDIÇÃO
PUT - /todo/{id} - update - todo.update - RECEBER OS DADOS E UPDATE ITEM
DELETE - /todo/{id} - destroy - todo.destroy - DELETAR O ITEM
*/

Route::get('/', 'HomeController');

Route::get('/login', 'Auth\LoginController@index')->name('login');
Route::post('/login', 'Auth\LoginController@authenticate');

Route::get('/register', 'Auth\RegisterController@index')->name('register');
Route::post('/register', 'Auth\RegisterController@register');

Route::get('/logout', 'Auth\LoginController@logout')->name('logout');

//PREFIX E GROUP PARA CRUD
Route::prefix('/tarefas')->group(function() {
    Route::get('/', 'TarefasController@list')->name('tarefas.list');
    Route::get('add', 'TarefasController@add')->name('tarefas.add');
    Route::post('add', 'TarefasController@addAction');
    Route::get('edit/{id}', 'TarefasController@edit')->name('tarefas.edit');
    Route::post('edit/{id}', 'TarefasController@editAction');
    Route::get('delete/{id}', 'TarefasController@del')->name('tarefas.delete');
    Route::get('marcar/{id}', 'TarefasController@done')->name('tarefas.done');
});

Route::prefix('/config')->group(function(){
    Route::get('/', 'Admin\ConfigController@index')->name('config.index')->middleware('auth');
    Route::post('/', 'Admin\ConfigController@index');

    Route::get('info', 'Admin\ConfigController@info');
    Route::get('permissoes', 'Admin\ConfigController@permissoes');
});
Route::fallback(function(){
    return view('404');
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
