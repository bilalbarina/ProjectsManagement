<?php

namespace App\Http\Controllers;

use App\Models\Promotion;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\View;

class StudentController extends Controller
{
    protected function create(Promotion $promotion)
    {
        return view('student.create', ['promotion' => $promotion]);
    }

    protected function store(Request $request, Promotion $promotion)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => ['required', 'email', 'unique:students,email'],
        ]);

        Student::create([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email'),
            'token' => generateToken(),
            'promotion_id' => $promotion->id,
            'photo_color' => $this->randomColor(),
        ]);

        return redirect()
            ->route('promotion.view', ['promotion' => $promotion->token])
            ->with('success', 'Apprenant créée avec succès');
    }

    protected function edit(Student $student)
    {
        return view('student.edit', [
            'student' => $student,
        ]);
    }

    protected function update(Request $request, Student $student)
    {
        $request->validate([
            'first_name' => ['required'],
            'last_name' => ['required'],
            'email' => [
                'required', 'email',
                Rule::unique('students')->ignore($student->id)
            ],
        ]);

        $student->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'email' => $request->input('email')
        ]);

        return redirect()
            ->route('promotion.view', ['promotion' => $student->promotion]);
    }

    protected function delete(Student $student)
    {
        $student->delete();
        return back();
    }

    protected function search(Request $request, Promotion $promotion)
    {
        $name = $request->get('name', '*');

        $students = Student::where('promotion_token', $promotion->token)
            ->whereRaw('CONCAT(first_name, " ", last_name) LIKE "%' . $name .'%"')
            ->paginate(20);

        return View::make('components.student.table', [
            'promotion' => $promotion,
            'students' => $students,
            'page' => 1,
        ]);
    }

    protected function randomColor()
    {
        $colors = ['bg-green-600', 'bg-yellow-600', 'bg-orange-600', 'bg-red-600', 'bg-lime-600', 'bg-teal-600', 'bg-cyan-600', 'bg-blue-600', 'bg-indigo-600', 'bg-purple-600', 'bg-pink-600'];

        return $colors[array_rand($colors)];
    }
}
