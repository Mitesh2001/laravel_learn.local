@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center border-bottom mb-3">
        <h2>All your todos</h2>
        <a href="{{route('todo.create')}}"><span class="fa fa-plus-square text-secondary m-3"></span></a>
    </div>
    <x-alert/>
    @forelse($todos as $todo)
    <div class="d-flex justify-content-between px-4">
        @if($todo->completed)
        <span class="fas fa-check-square text-success mx-2" onclick="event.preventDefault();document.getElementById('form-incomplete-{{$todo->id}}').submit()"></span>
        <form style="display: none;" action="{{route('todo.incomplete',$todo->id)}}" method="post" id="{{'form-incomplete-'.$todo->id}}">
            @csrf
            @method('put')
        </form>
        <a href="{{route('todo.show',$todo->id)}}"><del>{{$todo->title}}</del></a>
        @else()
        <span class="fas fa-check text-dark mx-2" onclick="event.preventDefault();document.getElementById('form-complete-{{$todo->id}}').submit()"></span>
        <form style="display: none;" action="{{route('todo.complete',$todo->id)}}" method="post" id="{{'form-complete-'.$todo->id}}">
            @csrf
            @method('put')
        </form>
        <a href="{{route('todo.show',$todo->id)}}">{{$todo->title}}</a>
        @endif
        <div>
            <a href="{{route('todo.edit',$todo->id)}}"><i class="fas fa-pen text-warning mx-2"></i></a>
            <span class="fas fa-times text-danger"
                onclick="
                    event.preventDefault();
                    if(confirm('Are you sure to want delete ?')){
                        document.getElementById('form-delete-{{$todo->id}}').submit()
                    }
                ">
            </span>
            <form style="display: none;" action="{{route('todo.destroy',$todo->id)}}" method="post" id="{{'form-delete-'.$todo->id}}">
            @csrf
            @method('delete')
        </form>
        </div>
    </div>
    @empty
        <p class="text-danger">No task available, create one</p>
    @endforelse
@endsection()
