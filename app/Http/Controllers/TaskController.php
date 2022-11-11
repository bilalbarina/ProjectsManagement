<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class TaskController extends Controller
{

    protected function create(Project $project)
    {
        return view('task.create', compact('project'));
    }

    protected function store(Request $request, Project $project)
    {
        $request->validate([
            'tasks.*.title' => ['required', 'string']
            ]);

        $query = array_map(function($task) use($project) {
            $task['project_id'] = $project->id;
            $task['token'] = generateToken();
            return $task;
        }, $request->tasks);

        Task::insert($query);

        return redirect()->route('project.view', ['project' => $project]);
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

        return redirect()->route('project.view', ['project' => $task->project]);
    }

    protected function search(Request $request, Project $project)
    {
        $title = $request->get('title', '*');

        $tasks = $project->tasks()->where('title', 'LIKE', "%$title%")->get();
        
        return View::make('components.task.table', [
            'tasks' => $tasks
        ]);
    }

    protected function destroy(Task $task)
    {
        $task->delete();
        return back();
    }

}
