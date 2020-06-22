<?php

namespace App\Jobs;

use App\Todo;
use App\TodoMirror;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Route;

class CreateTodoJob
{
    use Dispatchable, Queueable, SerializesModels;


    public function handle()
    {
        try {
            Todo::create(request()->only('name', 'description'));
            TodoMirror::create(request()->only('name', 'description'));
            if (Route::currentRouteName() == "todo.store") {
                return Redirect::route('todo')->with('status', 'Todo stored successfully');
            }else{
                return Redirect::route('todo_mirror')->with('status', 'Todo mirror stored successfully');
            }
        }catch (\Exception $e) {
            Log::error($e);
            if (Route::currentRouteName() == "todo.store") {
                return Redirect::route('todo')->with('status', 'Todo was not stored successfully for the following error ', $e);
            }else{
                return Redirect::route('todo_mirror')->with('status', 'Todo was not stored successfully for the following error ', $e);
            }
        }


    }
}
