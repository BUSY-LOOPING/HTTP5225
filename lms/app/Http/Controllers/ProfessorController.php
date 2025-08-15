<?php

namespace App\Http\Controllers;

use App\Models\Professor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProfessorController extends Controller
{
    public function index()
    {
        $professors = Professor::with('course')->get();
        return view('professors.index', compact('professors'));
    }

    public function create()
    {
        return view('professors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors',
            'department' => 'required|string|max:255'
        ]);

        Professor::create($request->all());
        Session::flash('success', 'Professor created successfully');
        return redirect()->route('professors.index');
    }

    public function show(Professor $professor)
    {
        $professor->load('course');
        return view('professors.show', compact('professor'));
    }

    public function edit(Professor $professor)
    {
        return view('professors.edit', compact('professor'));
    }

    public function update(Request $request, Professor $professor)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:professors,email,' . $professor->id,
            'department' => 'required|string|max:255'
        ]);

        $professor->update($request->all());
        Session::flash('success', 'Professor updated successfully');
        return redirect()->route('professors.index');
    }

    public function destroy(Professor $professor)
    {
        $professor->delete();
        Session::flash('success', 'Professor deleted successfully');
        return redirect()->route('professors.index');
    }
}
