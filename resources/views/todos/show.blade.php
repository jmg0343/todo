@extends('layouts.app')

@section('title')
    {{ $todo->name}}
@endsection

@section('content')
<h1 class="text-center my-5">{{ $todo->name }}</h1>

<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card card-default">
            <div class="card-header">Details</div>

            <div class="card-body">
                {{ $todo->description }}
            </div>
        </div>

        <a href="{{ route('todo.edit', $todo->id) }}" class="btn btn-success my-2">Edit</a>
        <a href="{{ route('todo.index') }}" class="btn btn-primary my-2">Back To Tasks</a>
        <a href="{{ route('todo.delete', $todo->id) }}" 
            onclick="return confirm('Are you sure you want to delete this item?');" 
            class="btn btn-danger my-2 pull-right"
        >
            Delete
        </a>
    </div>
</div>
@endsection