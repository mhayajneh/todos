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
Route::get('/', function (){
    return \Illuminate\Support\Facades\Redirect::route('todo.index');
});

Route::resource('todo', 'TodoController');
Route::resource('todo_mirror', 'TodoMirrorController');
