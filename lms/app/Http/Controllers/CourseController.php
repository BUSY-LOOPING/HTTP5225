<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::with('professor', 'students')->get();
        return view('courses.index', compact('courses'));
    }

    public function create()
    {
        $professors = Professor::doesntHave('course')->get();
        return view('courses.create', compact('professors'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses',
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1',
            'professor_id' => 'required|exists:professors,id'
        ]);

        Course::create($request->all());
        Session::flash('success', 'Course created successfully');
        return redirect()->route('courses.index');
    }

    public function show(Course $course)
    {
        $course->load('professor', 'students');
        return view('courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        $professors = Professor::where('id', $course->professor_id)
                               ->orDoesntHave('course')
                               ->get();
        return view('courses.edit', compact('course', 'professors'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'code' => 'required|string|unique:courses,code,' . $course->id,
            'description' => 'nullable|string',
            'credits' => 'required|integer|min:1',
            'professor_id' => 'required|exists:professors,id'
        ]);

        $course->update($request->all());
        Session::flash('success', 'Course updated successfully');
        return redirect()->route('courses.index');
    }

    public function destroy(Course $course)
    {
        $course->delete();
        Session::flash('success', 'Course deleted successfully');
        return redirect()->route('courses.index');
    }
}
