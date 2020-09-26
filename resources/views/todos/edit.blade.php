@extends('todos.layout')

@section('content')
    <x-alert/>
    <div class=" d-flex justify-content-center border-bottom mb-3">
        <h2>Update the To-do</h2>
        <a href="{{route('todo.index')}}"><i class="fa fa-arrow-circle-left text-secondary m-3" aria-hidden="true"></i></a>
    </div>
    <form action="{{route('todo.update',$todo->id)}}" method="post">
        @csrf
        @method('patch')
        <div class="mx-2"><input type="text" name="title" value="{{$todo->title}}" class="form-group" placeholder="Title..."></div>
        <div class="mx-2"><textarea name="description">{{$todo->description}}</textarea></div>
        @livewire('editstep',['steps' => $todo->steps])
        <div class="mx-2"><input type="submit" value="Update" class="btn btn-primary"></div>
    </form>
@endsection
