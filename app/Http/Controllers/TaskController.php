<?php

namespace TaskManager\Http\Controllers;

use Illuminate\Http\Request;
use \TaskManager\Task;
use Carbon\Carbon;
use Session;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tasks = Task::where('status', '!=', 2)->orderBy('due_at', 'ASC')->get();
        return view('tasks.index')->with('tasks', $tasks);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tasks.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'sometimes|max:255',
            'priority' => 'sometimes'
        ]);

        $task = new Task();
        $task->status = 0;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->due_at = $request->due_at;
        
        $task->save();

        Session::flash('success', 'The task was created successfully!');
        return redirect()->route('tasks.show', $task->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::where('id', $id)->first();
        return view('tasks.show')->with('task', $task);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $task = Task::where('id', $id)->first();
        return view('tasks.edit')->with('task', $task);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required|max:100',
            'description' => 'sometimes|max:255',
            'priority' => 'sometimes'
        ]);

        $task = Task::findOrFail($id);
        $task->status = $request->status;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->priority = $request->priority;
        $task->due_at = $request->due_at;
        
        $task->save();

        Session::flash('success', 'The task was updated successfully!');
        return redirect()->route('tasks.show', $id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        
        $task->delete();

        Session::flash('success', 'The task was deleted successfully!');
        return redirect()->route('tasks.index');
    }
}
