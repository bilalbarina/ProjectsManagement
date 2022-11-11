<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rule;
use Illuminate\View\View as ViewView;

class PromotionController extends Controller
{
    protected function index()
    {
        $promotions = Promotion::all();
        return view('promotion.index', [
            'promotions' => $promotions
        ]);
    }

    protected function create()
    {
        return view('promotion.create');
    }

    protected function store(Request $request)
    {
        $request->validate([
            'title' => ['required', 'string', 'unique:promotions,title']
        ]);

        Promotion::create([
            'title' => $request->get('title'),
            'token' => generateToken(),
        ]);

        return redirect()
            ->route('promotion.index')
            ->with('success', 'Promotion créée avec succès');
    }

    protected function view(Request $request, Promotion $promotion)
    {
        $page = $request->get('page', 1);
        $students = $promotion->students()->paginate(5);

        # Get assigned projects to promotion's students
        $assignedProjects = collect();
        foreach($promotion->students as $student) {
            foreach($student->projects as $project) {
                if (!$assignedProjects->contains($project->title))
                {
                    $assignedProjects[] = $project->title;
                }
            }
        }

        return view('promotion.view', [
            'promotion' => $promotion,
            'students' => $students,
            'assignedProjects' => $assignedProjects,
            'page' => $page,
        ]);
    }

    protected function update(Request $request, Promotion $promotion)
    {
        $promotion->update($request->input());

        return redirect()
            ->route('promotion.index')
            ->with('success', 'La promotion a été mise à jour avec succès');
    }

    protected function delete(Promotion $promotion)
    {
        $promotion->delete();

        return back()
            ->with('success', 'Promotion supprimée avec succès');
    }

    protected function search(Request $request)
    {
        $title = $request->get('title', '*');

        $promotions = Promotion::where('title', 'LIKE', "%$title%")->get();
        
        return  View::make('components.promotion.table', [
            'promotions' => $promotions
        ]);
    }

    protected function updateTitle(Request $request, Promotion $promotion)
    {
        $request->validate([
            'title' => [
                'required', 'string',
                    Rule::unique('promotions', 'title')->ignore($promotion->id)
            ]
        ]);

        $promotion->title = $request->get('title');
        $promotion->save();

        return response()->json([
            'success' => true
        ]);
    }
}
