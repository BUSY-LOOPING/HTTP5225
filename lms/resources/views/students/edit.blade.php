@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            Edit Student
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('students.update', $student) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="fname">First Name</label>
                <input type="text" class="form-control @error('fname') is-invalid @enderror" 
                       id="fname" name="fname" value="{{ old('fname', $student->fname) }}" required>
                @error('fname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="lname">Last Name</label>
                <input type="text" class="form-control @error('lname') is-invalid @enderror" 
                       id="lname" name="lname" value="{{ old('lname', $student->lname) }}" required>
                @error('lname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $student->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label>Select Courses</label>
                <div class="row">
                    @foreach($courses as $course)
                    <div class="col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" 
                                   name="courses[]" value="{{ $course->id }}" 
                                   id="course_{{ $course->id }}"
                                   {{ $student->courses->contains($course->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="course_{{ $course->id }}">
                                {{ $course->name }} ({{ $course->code }}) - {{ $course->credits }} credits
                            </label>
                        </div>
                    </div>
                    @endforeach
                </div>
                @error('courses')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
