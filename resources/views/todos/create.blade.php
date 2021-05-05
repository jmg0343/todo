@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Create To-Do</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create New To-Do</div>

                <div class="card-body">
                    <form action="/store-todo" method="POST">
                        @csrf
                        <div class="mb-3">
                            <input type="text" class="form-control" placeholder="name" name="name">
                        </div>
                        <div class="mb-3">
                            <textarea name="description" placeholder="description" id="" cols="5" rows="5" class="form-control"></textarea>
                        </div>
                        <div class="mb-3 text-center">
                            <button type="submit" class="btn btn-success">Create</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection