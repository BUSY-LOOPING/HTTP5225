@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            Add New Student
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            
            <div class="form-group mb-3">
                <label for="fname">First Name</label>
                <input type="text" class="form-control @error('fname') is-invalid @enderror" 
                       id="fname" name="fname" value="{{ old('fname') }}" required>
                @error('fname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" 
                       id="lname" name="lname" value="{{ old('lname') }}" required>
                @error('lname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email') }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label>Select Courses</label>
                @if($courses->count() > 0)
                    <div class="row">
                        @foreach($courses as $course)
                        <div class="col-md-6">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" 
                                       name="courses[]" value="{{ $course->id }}" 
                                       id="course_{{ $course->id }}">
                                <label class="form-check-label" for="course_{{ $course->id }}">
                                    {{ $course->name }} ({{ $course->code }}) - {{ $course->credits }} credits
                                </label>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-warning">
                        No courses available. <a href="{{ route('courses.create') }}">Add a course first</a>
                    </div>
                @endif
                @error('courses')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-success">Create Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
