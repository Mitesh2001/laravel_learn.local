<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TodoController extends Controller
{
    public function index()
    {
        $todos = Todo::orderBy('completed')->get();
        return view('todos.index', compact('todos'));
    }

    public function create()
    {
        return view('todos.create');
    }

    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    public function store(TodoCreateRequest $request)
    {
        Todo::create($request->all());
        return redirect(route('todo.index'))->with('message', 'To do created successfully !');
    }

    public function update(Todo $todo, TodoCreateRequest $request)
    {
        $todo->update(['title' => $request->title]) ;
        return redirect(route('todo.index'))->with('message', 'Updated');
    }

    public function complete(Todo $todo)
    {
        $todo->update(['completed' => true]);
        return redirect(route('todo.index'))->with('message', '" '.$todo->title.' "'.' is mark as completed !!');
    }

    public function incomplete(Todo $todo)
    {
        $todo->update(['completed' => false]);
        return redirect(route('todo.index'))->with('message', '" '.$todo->title.' "'.' is mark as incompleted !!');
    }

    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect(route('todo.index'))->with('message', '" '.$todo->title.' "'.' deleted !!');
    }
}
