@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center border-bottom mb-3">
        <h2>{{$todo->title}}</h2>
        <a href="{{route('todo.index')}}"><span class="fa fa-arrow-circle-left text-secondary m-3" aria-hidden="true"></span></a>
    </div>
    <div>
        <div>
            <p>{{$todo->description}}</p>
        </div>
    </div>
@endsection()
