@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            View all Professors
        </h1>
    </div>
</div>

<div class="row mb-3">
    <div class="col">
        <a href="{{ route('professors.create') }}" class="btn btn-primary">Add New Professor</a>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">View Students</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">View Courses</a>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<div class="row">
    @foreach($professors as $professor)
    <div class="col-md-4 mb-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">{{ $professor->name }}</h5>
                <p class="card-text">
                    <strong>Email:</strong> {{ $professor->email }}<br>
                    <strong>Department:</strong> {{ $professor->department }}<br>
                    <strong>Course:</strong> {{ $professor->course ? $professor->course->name : 'No Course Assigned' }}
                </p>
                <a href="{{ route('professors.show', $professor->id) }}" class="card-link">View</a>
                <a href="{{ route('professors.edit', $professor->id) }}" class="card-link">Edit</a>
                <form action="{{ route('professors.destroy', $professor) }}" method="POST" style="display: inline;">
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
