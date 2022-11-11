<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;

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
            'token' => generateToken(),
            'delivery_date' => $request->get('delivery_date'),
            'due_date' =>$request->get('due_date'),
        ]);

        return redirect()->route('project.index');
    }

    protected function view(Project $project)
    {
        return view('project.view', compact('project'));
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

    protected function search(Request $request)
    {
        $title = $request->get('title', '*');

        $projects = Project::where('title', 'LIKE', "%$title%")->get();
        
        return View::make('components.project.table', [
            'projects' => $projects
        ]);
    }

    protected function destroy(Project $project)
    {
        $project->delete();
        return back();
    }

    protected function updateTitle(Request $request, Project $project)
    {
        $request->validate([
            'title' => [
                'required', 'string',
                    Rule::unique('projects', 'title')->ignore($project->id)
            ]
        ]);

        $project->title = $request->get('title');
        $project->save();

        return response()->json([
            'success' => true
        ]);
    }
}
