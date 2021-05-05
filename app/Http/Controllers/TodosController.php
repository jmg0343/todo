<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index()
    {
        // fetch todos from db
        $todos = Todo::all();

        return view('todos.index')->with('todos', $todos);
    }

    public function show($todoId)
    {
        $todo = Todo::find($todoId);

        return view('todos.show')->with('todo', $todo);
    }
}
