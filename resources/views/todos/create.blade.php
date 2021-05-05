@extends('layouts.app')

@section('content')
    <h1 class="text-center my-5">Create To-Do</h1>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card card-default">
                <div class="card-header">Create New To-Do</div>

                <div class="card-body">
                    @if ($errors->any())
                        <div>
                            <ul class="list-group">
                                @foreach ($errors->all() as $error)
                                    {{-- <li class="list-group-item alert alert-danger" role="alert">
                                        {{ $error }}
                                    </li> --}}
                                    <div class="alert alert-danger" role="alert">
                                        {{ $error }}
                                      </div>
                                @endforeach
                            </ul>
                        </div>    
                    @endif
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