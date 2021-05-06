@extends('layouts.app')

@section('title')
    To-Do List
@endsection

@section('content')
<h1 class="text-center my-5">TO-DO PAGE</h1>
    
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card card-default">
            <div class="card-header">
                Tasks
                <a href="/new-todos" class="btn btn-success btn-sm float-end"><i class="fa fa-plus" aria-hidden="true"></i></a>
            </div>

            <div class="card-body">
                <ul class="list-group">
                    @foreach ($todos as $todo)
                        <li class="list-group-item {{ $todo->completed ? 'bg-light' : ''}}">
                            <a href="/todos/{{ $todo->id }}/delete" onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-danger btn-sm me-2"><i class="fa fa-minus" aria-hidden="true"></i></a>
                            @if ($todo->completed)
                                <s>{{ $todo->name }}</s>
                                <a href="/todos/{{ $todo->id }}/complete?undo=true" class="btn btn-secondary btn-sm float-end ms-2">Undo</a>
                            @else
                                {{ $todo->name }}
                                <a href="/todos/{{ $todo->id }}/complete" class="btn btn-success btn-sm float-end ms-2">Complete</a>
                            @endif
                            
                            <a href="/todos/{{ $todo->id }}" class="btn btn-primary btn-sm float-end">View</a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection