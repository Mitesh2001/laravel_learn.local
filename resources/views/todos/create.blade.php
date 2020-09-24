@extends('todos.layout')

@section('content')
    <div class="d-flex justify-content-center border-bottom mb-3">
        <h2>What to do next</h2>
        <a href="{{route('todo.index')}}"><span class="fa fa-arrow-circle-left text-secondary m-3" aria-hidden="true"></span></a>
    </div>
    <x-alert/>
    <form action="{{route('todo.store')}}" method="post">
        @csrf
        <div class="my-1"><input type="text" name="title" class="form-group" placeholder="Title"></div>
        <div class="my-1"><textarea class="form-group" name="description" placeholder="Description..."></textarea></div>
        @livewire('step')
        <div class="my-1"><input type="submit" value="Create" class="btn btn-primary"></div>
    </form>
@endsection()
