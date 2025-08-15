@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            View all Courses
        </h1>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">View Students</a>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">View Professors</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    @foreach($courses as $course)
    <div class="col-md-4 mb-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $course->name }}</h5>
                <p class="card-text">
                    <strong>Code:</strong> {{ $course->code }}<br>
                    <strong>Credits:</strong> {{ $course->credits }}<br>
                    <strong>Professor:</strong> {{ $course->professor ? $course->professor->name : 'Not Assigned' }}<br>
                    <strong>Students:</strong> <span class="badge badge-primary">{{ $course->students->count() }}</span>
                </p>
                <a href="{{ route('courses.show', $course->id) }}" class="card-link">View</a>
                <a href="{{ route('courses.edit', $course->id) }}" class="card-link">Edit</a>
                <form action="{{ route('courses.destroy', $course) }}" method="POST" style="display: inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-link card-link text-danger p-0" 
                            onclick="return confirm('Are you sure?')">Delete</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
