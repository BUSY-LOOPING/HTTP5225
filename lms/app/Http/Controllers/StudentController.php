<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\Course;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use Illuminate\Support\Facades\Session;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = Student::with('courses')->get();
        return view('students.index', compact('students'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all();
        return view('students.create', compact('courses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStudentRequest $request)
    {
        $student = Student::create($request->validated());
        
        // Attach selected courses if any
        if ($request->has('courses')) {
            $student->courses()->attach($request->courses);
        }
        
        Session::flash('success', 'Student created successfully');
        return redirect()->route('students.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Student $student)
    {
        $student->load('courses');
        return view('students.show', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Student $student)
    {
        $courses = Course::all();
        return view('students.edit', compact('student', 'courses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStudentRequest $request, Student $student)
    {
        $student->update($request->validated());
        
        // Sync courses (remove old and add new)
        $student->courses()->sync($request->courses ?? []);
        
        Session::flash('success', 'Updated successfully');
        return redirect()->route('students.index');
    }

    public function trash($id)
    {
        Student::destroy($id);
        Session::flash('success', 'Student trashed successfully');
        return redirect()->route('students.index');
    }
    
    public function destroy($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        $student->forceDelete();
        Session::flash('success', 'Student deleted successfully');
        return redirect()->route('students.index');
    }

    public function restore($id)
    {
        $student = Student::withTrashed()->where('id', $id)->first();
        $student->restore();
        Session::flash('success', 'Student restored successfully');
        return redirect()->route('students.trashed');
    }
}
