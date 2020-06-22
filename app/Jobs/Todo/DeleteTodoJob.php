<?php

namespace App\Jobs;

use App\Todo;
use App\TodoMirror;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DeleteTodoJob
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
            $this->todo->delete();
            TodoMirror::where('id', $this->todo->id)->delete();
            return Redirect::route('todo.index')->with('status', 'Todo deleted successfully');
        }catch (\Exception $e) {
            Log::error($e);
            return Redirect::route('todo.index')->with('status', 'Todo was not deleted successfully for the following error ' . $e);
        }
    }
}
