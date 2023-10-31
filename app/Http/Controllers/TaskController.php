<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            "title" => "Tasks",
            'tasks' => Task::query()->where('user_id', auth()->user()->user_id)->get(),
        ];

        return view('tasks.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            "title" => "Create Task",
        ];

        return view('tasks.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'started' => 'required',
            'deadline' => 'required|after_or_equal:started',
            'status' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->user_id;

        Task::query()->create($validated);

        return redirect('/tasks');
    }

    /**
     * Display the specified resource.
     */
    public function show(Task $task)
    {
        $data = [
            'title' => 'Show Task',
            'task' => $task,
        ];

        return view('tasks.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Task $task)
    {
        $data = [
            'title' => 'Edit Task',
            'task' => $task,
        ];

        return view('tasks.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Task $task)
    {
        $validated = $request->validate([
            'task_name' => 'required',
            'description' => 'required',
            'started' => 'required',
            'deadline' => 'required|after_or_equal:started',
            'status' => 'required',
        ]);

        $validated['user_id'] = auth()->user()->user_id;

        $task::query()->where('task_id', $task->task_id)
            ->update($validated);

        return redirect('/tasks');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Task $task)
    {
        Task::destroy($task->task_id);

        return redirect('/tasks');
    }
}
