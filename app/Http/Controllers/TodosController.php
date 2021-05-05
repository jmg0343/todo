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

    public function create()
    {
        return view('todos.create');
    }

    public function store()
    {
        // call validator to require appropriate input
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);
        
        $data = request()->all();

        // create instance of To-Do model
        $todo = new Todo();

        // add appropriate data to our instance
        $todo->name = $data['name'];
        $todo->description = $data['description'];
        $todo->completed = false;

        // save to database
        $todo->save();

        return redirect('/todos');
    }

    public function edit($todoId)
    {
        $todo = Todo::find($todoId);

        return view('todos.edit')->with('todo', $todo);
    }

    public function update($todoId)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo = Todo::find($todoId);

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        return redirect('/todos');
    }
}
