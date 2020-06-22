<?php

namespace App\Jobs;

use App\Todo;
use App\TodoMirror;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class EditTodoJob
{
    use Dispatchable, SerializesModels;

    private $todo;


    public function __construct(Todo $todo)
    {
        $this->todo = $todo;
    }

    public function handle()
    {
        try {
            $this->todo->fill(request()->only('name', 'description'))->save();
            TodoMirror::where('id', $this->todo->id)->first()->fill(request()->only('name', 'description'))->save();
            return Redirect::route('todo.index')->with('status', 'Todo updated successfully');
        }catch (\Exception $e) {
            Log::error($e);
            return Redirect::route('todo.index')->with('status', 'Todo was not updated successfully for the following error ' . $e);
        }

    }
}
