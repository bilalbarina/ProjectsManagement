<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\ProjectStudent;
use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class AssignmentController extends Controller
{
    protected function index(Project $project)
    {
        $students = Promotion::all()->last()->students()->paginate(5);

        return view('project.assign', [
            'project' => $project,
            'students' => $students,
        ]);
    }

    protected function assign(Project $project, $student_id)
    {
        if ($project->students->contains($student_id)) {
            return back()->withErrors('Student already assigned to this project');
        }

        ProjectStudent::create([
            'project_id' => $project->id,
            'student_id' => $student_id
        ]);

        return back()->with('success', 'Project has been assigned to the student');
    }

    protected function unassign(Project $project, $student_id)
    {
        ProjectStudent::where('project_id', $project->id)
            ->where('student_id', $student_id)
            ->firstOrFail()
            ->delete();

        return back()->with('success', 'Project has been unassigned to the student');
    }

    protected function assignToAll(Project $project)
    {
        $students = Promotion::all()->last()->students;

        $query = $students->map(function($student) use ($project) {
            if (!$project->students->contains($student->id))
            {
                return [
                    'project_id' => $project->id,
                    'student_id' => $student->id,
                ];
            }
        })->whereNotNull()->all();
        
        ProjectStudent::insert($query);

        return back()->with('success', 'Project has been assigned to all students.');
    }

    protected function searchStudents(Request $request, Project $project)
    {
        $name = $request->get('name', '*');

        $students = Promotion::all()->last()->students()
            ->whereRaw('CONCAT(first_name, " ", last_name) LIKE "%' . $name .'%"')
            ->paginate(20);

        return View::make('components.student.assignment-table', [
            'project' => $project,
            'students' => $students
        ]);
    }
}
