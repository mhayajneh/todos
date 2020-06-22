<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Jobs\CreateTodoJob;
use App\Jobs\DeleteTodoJob;
use App\Jobs\DeleteTodoMirrorJob;
use App\Jobs\EditTodoJob;
use App\Jobs\EditTodoMirrorJob;
use App\Todo;
use App\TodoMirror;
use Illuminate\Http\Request;

class TodoMirrorController extends Controller
{
    public function index(){
        $todos = Todo::paginate(10);
        return view('todo-mirror.index', compact('todos'));
    }

    public function create(){
        return view('todo-mirror.create');
    }

    public function store(TodoRequest $request){
        return $this->dispatch(new CreateTodoJob());
    }

    public function edit(TodoMirror $todo){
        return view('todo-mirror.edit', compact('todo'));
    }

    public function update(TodoRequest $request, TodoMirror $todo){
        return $this->dispatch(new EditTodoMirrorJob($todo));
    }

    public function destroy(TodoMirror $todo){
        return $this->dispatch(new DeleteTodoMirrorJob($todo));
    }
}
