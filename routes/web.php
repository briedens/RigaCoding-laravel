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
    return view('/project/index');
});

Route::get('/todo', function () {

    $todosFromtDatabases = \App\Todo::orderBy('updated_at', 'asc')->get();



    return view('/project/todo', [
        'todos' => $todosFromtDatabases,
    ]);
});


Route::any('/todo/addnew', function () {

    $newTodo = new \App\Todo;

    $newTodo->title =  \Request('note');
    $newTodo->body = 'Some default body';
    $newTodo->is_done = false;

    $newTodo->save();

    //dd( $newTodo);

    return redirect ('/todo');
});


Route::get('/todo/delete/{id}', function($id) {

    $todo = \App\Todo::find($id);

    if ($todo != null){
        $todo->delete();
    }

    return redirect ('/todo');
});


Route::get('/todo/update/{id}', function($id) {

    $todo = \App\Todo::find($id);

    if ($todo->is_done == true){
        $todo->is_done = false;
    } else {
        $todo->is_done = true;
    }

    $todo->save();

    return redirect ('/todo');
});











Route::get('/test', function () {
    return view('welcome');
});



