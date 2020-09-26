<?php

namespace App\Http\Controllers;

use App\Http\Requests\TodoCreateRequest;
use App\Models\Step;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoReourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function index()
    {
        $todos = auth()->user()->todos()->orderBy('completed')->get();
        return view('todos.index', compact('todos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('todos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TodoCreateRequest  $request)
    {
        $todo = auth()->user()->todos()->create($request->all());
        if ($request->step) {
            foreach ($request->step as $step) {
                $todo->steps()->create(['name'=>$step]);
            }
        }
        return redirect(route('todo.index'))->with('message', 'To do created successfully !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        return view('todos.show', compact('todo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return view('todos.edit', compact('todo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Todo $todo, TodoCreateRequest $request)
    {
        $todo->update(['title' => $request->title,'description' => $request->description]) ;
        if ($request->stepName) {
            foreach ($request->stepName as $key => $value) {
                $id = $request->stepId[$key];
                Step::find($id)->update(['name'=> $value ]);
            }
        }

        return redirect(route('todo.index'))->with('message', 'Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->steps->each->delete();
        $todo->delete();
        return redirect(route('todo.index'))->with('message', '" '.$todo->title.' "'.' deleted !!');
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
}
