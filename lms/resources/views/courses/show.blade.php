@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-4">
            Course Details
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>{{ $course->name }} ({{ $course->code }})</h3>
            </div>
            <div class="card-body">
                <p><strong>Credits:</strong> {{ $course->credits }}</p>
                <p><strong>Description:</strong> {{ $course->description ?? 'No description available' }}</p>
                <p><strong>Professor:</strong> {{ $course->professor ? $course->professor->name : 'Not assigned' }}</p>
                @if($course->professor)
                    <p><strong>Department:</strong> {{ $course->professor->department }}</p>
                @endif
                
                <h5 class="mt-4">Enrolled Students ({{ $course->students->count() }}):</h5>
                @if($course->students->count() > 0)
                    <div class="row">
                        @foreach($course->students as $student)
                        <div class="col-md-6 mb-2">
                            <div class="card border-success">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $student->fname }} {{ $student->lname }}</h6>
                                    <p class="card-text">{{ $student->email }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        No students enrolled in this course.
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back to Courses</a>
                <a href="{{ route('courses.edit', $course) }}" class="btn btn-primary">Edit Course</a>
            </div>
        </div>
    </div>
</div>
@endsection
