<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    protected function create(Project $project)
    {
        return view('task.create', compact('project'));
    }

    protected function store(Request $request, Project $project)
    {
        Task::create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'project_id' => $project->id,
        ]);

        return redirect()->route('project.edit', ['project' => $project]);
    }

    protected function edit(Task $task)
    {
        return view('task.edit', compact('task'));
    }

    protected function update(Request $request, Task $task)
    {
        $task->update([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'start_date' =>$request->get('start_date'),
            'end_date' =>$request->get('end_date'),
        ]);

        return back();
    }

    protected function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
}
