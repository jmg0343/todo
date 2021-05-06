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

    // route/model binding automatically injects model instance that has matching ID
    // as long as Todo model is type hinted
    public function show(Todo $todo)
    {
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

        // create flash message letting user know task was created
        // layouts.app displays the message, since it will appear globally
        session()->flash('success', 'Task successfully created!');

        return redirect('/todos');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit')->with('todo', $todo);
    }

    public function update(Todo $todo)
    {
        $this->validate(request(), [
            'name' => 'required',
            'description' => 'required'
        ]);

        $data = request()->all();

        $todo->name = $data['name'];
        $todo->description = $data['description'];

        $todo->save();

        session()->flash('success', 'Task sucessfully updated!');

        return redirect('/todos');
    }

    public function delete(Todo $todo)
    {
        $todo->delete();

        session()->flash('success', 'Task successfully deleted!');

        return redirect('/todos');
    }
}
