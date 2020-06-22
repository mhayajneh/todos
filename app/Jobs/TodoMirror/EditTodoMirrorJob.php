<?php

namespace App\Jobs;

use App\Todo;
use App\TodoMirror;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class EditTodoMirrorJob
{
    use Dispatchable, SerializesModels;

    private $todoMirror;


    public function __construct(TodoMirror $todoMirror)
    {
        $this->todoMirror = $todoMirror;
    }
    public function handle()
    {
        try {
            $this->todoMirror->fill(request()->only('name', 'description'));
            Todo::where('id', $this->todoMirror->id)->fill(request()->only('name', 'description'));
            return Redirect::route('todo_mirror')->with('status', 'Todo mirror updated successfully');
        }catch (\Exception $e) {
            Log::error($e);
            return Redirect::route('todo_mirror')->with('status', 'Todo mirror not updated successfully for the following error ', $e);
        }

    }
}
