<?php

namespace App\Jobs;

use App\Todo;
use App\TodoMirror;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;

class DeleteTodoMirrorJob
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
            $this->todoMirror->delete();
            Todo::where('id', $this->todoMirror->id)->delete();
            return Redirect::route('todo_mirror')->with('status', 'Todo mirror deleted successfully');
        }catch (\Exception $e) {
            Log::error($e);
            return Redirect::route('todo_mirror')->with('status', 'Todo mirror was not deleted successfully for the following error ', $e);
        }
    }
}
