@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center border-bottom mb-3">
        <h2><b>{{$todo->title}}</b></h2>
        <a href="{{route('todo.index')}}"><span class="fa fa-arrow-circle-left text-secondary m-3" aria-hidden="true"></span></a>
    </div>
    <div>
        <div class="border-bottom mb-3">
            <h4 class="text-bold"><b>Description</b></h4>
            <p>{{$todo->description}}</p>
        </div>
        <div class="mb-3">
            <h4 class="text-bold"><b>Steps for this task</b></h4>
            @forelse($todo->steps as $step)
            <p>{{$step->name}}</p>
            @empty
            <p class="text-danger">No steps are available for this task</p>
            @endforelse
        </div>
    </div>
@endsection()
