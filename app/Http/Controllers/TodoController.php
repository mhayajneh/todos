<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoRequest;
use App\Jobs\CreateTodoJob;
use App\Jobs\DeleteTodoJob;
use App\Jobs\EditTodoJob;
use App\TodoMirror;
use Illuminate\Http\Request;
use App\Todo;
use Illuminate\Support\Facades\Log;

class TodoController extends Controller
{
    public function index(){
        $todos = Todo::paginate(10);
        return view('todo.index', compact('todos'));
    }

    public function create(){
        return view('todo.create');
    }

    public function store(TodoRequest $request){
        return $this->dispatch(new CreateTodoJob());
    }

    public function edit(Todo $todo){
        return view('todo.edit', compact('todo'));
    }

    public function update(TodoRequest $request, Todo $todo){
        return $this->dispatch(new EditTodoJob($todo));
    }

    public function destroy(Todo $todo){
        return $this->dispatch(new DeleteTodoJob($todo));
    }
}
