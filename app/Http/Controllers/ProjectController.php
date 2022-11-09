<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    protected function index()
    {
        $projects = Project::all();
        return view('project.index', compact('projects'));
    }

    protected function create()
    {
        return view('project.create');
    }

    protected function store(Request $request)
    {
        Project::create([
            'title' => $request->get('title'),
            'delivery_date' => $request->get('delivery_date'),
            'due_date' =>$request->get('due_date'),
        ]);

        return redirect()->route('project.index');
    }

    protected function edit(Project $project)
    {
        return view('project.edit', compact('project'));
    }

    protected function update(Request $request, Project $project)
    {
        $project->update([
            'title' => $request->get('title'),
            'delivery_date' => $request->get('delivery_date'),
            'due_date' =>$request->get('due_date'),
        ]);

        return back();
    }

    protected function destroy(Project $project)
    {
        $project->delete();
        return back();
    }
}
