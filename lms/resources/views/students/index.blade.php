@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            View all Students
        </h1>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <a href="{{ route('students.create') }}" class="btn btn-primary">Add New Student</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">View Courses</a>
        <a href="{{ route('professors.index') }}" class="btn btn-secondary">View Professors</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    @foreach($students as $student)
    <div class="col-md-4 mb-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $student->fname }} {{ $student->lname }}</h5>
                <p class="card-text">
                    <strong>Email:</strong> {{ $student->email }}<br>
                    <strong>Courses:</strong> 
                    @if($student->courses->count() > 0)
                        @foreach($student->courses as $course)
                            <span class="badge badge-info">{{ $course->name }}</span>
                        @endforeach
                    @else
                        <span class="text-muted">No courses enrolled</span>
                    @endif
                </p>
                <a href="{{ route('students.show', $student->id) }}" class="card-link">View</a>
                <a href="{{ route('students.edit', $student->id) }}" class="card-link">Edit</a>
                <a href="{{ route('students.trash', $student->id) }}" class="card-link text-danger">Delete</a>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
