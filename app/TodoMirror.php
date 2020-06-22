<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodoMirror extends Model
{
    protected $table = 'todos_mirror';
    protected $fillable = ['name', 'description'];
}
