@extends('layouts.app')

@section('title')
    To-Do List
@endsection

@section('content')
<h1 class="text-center my-5">TO-DO LIST</h1>
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Tasks
                <a href="/new-todos" class="btn btn-success btn-sm float-end"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>

            <div class="card-body">
                <ul class="list-group taskList">
                    @foreach ($todos as $todo)
                        <li class="list-group-item {{ $todo->completed ? 'bg-light complete' : ''}}">
                            <a href="{{ route('todo.delete', $todo->id) }}" 
                                onclick="return confirm('Are you sure you want to delete this item?');" 
                                class="btn btn-danger btn-sm me-2"><i class="fa fa-minus" 
                                aria-hidden="true"
                            >
                                </i>
                            </a>
                            @if ($todo->completed)
                                <s>{{ $todo->name }}</s>
                                <a href="/todos/{{ $todo->id }}/complete?undo=true" class="btn btn-secondary btn-sm float-end ms-2">Undo</a>
                            @else
                                {{ $todo->name }}
                                <a href="/todos/{{ $todo->id }}/complete" class="btn btn-success btn-sm float-end ms-2">Complete</a>
                            @endif
                            
                            <a href="{{ route('todo.show', $todo->id) }}" class="btn btn-primary btn-sm float-end">View</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection

@section('javascript')
    <script type="text/javascript">
        var $taskList = $('.taskList');
        var $tasks = $taskList.children('li');
        var sortList = Array.prototype.sort.bind($tasks);

        var $completed = $tasks.filter('.complete');

        console.log($tasks);
    </script>
@endsection