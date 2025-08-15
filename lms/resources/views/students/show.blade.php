@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            Student Details
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>{{ $student->fname }} {{ $student->lname }}</h3>
            </div>
            <div class="card-body">
                <p><strong>ID:</strong> {{ $student->id }}</p>
                <p><strong>Email:</strong> {{ $student->email }}</p>
                <p><strong>Created:</strong> {{ $student->created_at->format('M d, Y') }}</p>
                
                <h5 class="mt-4">Enrolled Courses:</h5>
                @if($student->courses->count() > 0)
                    <div class="row">
                        @foreach($student->courses as $course)
                        <div class="col-md-6 mb-2">
                            <div class="card border-info">
                                <div class="card-body">
                                    <h6 class="card-title">{{ $course->name }}</h6>
                                    <p class="card-text">
                                        <strong>Code:</strong> {{ $course->code }}<br>
                                        <strong>Credits:</strong> {{ $course->credits }}<br>
                                        @if($course->professor)
                                            <strong>Professor:</strong> {{ $course->professor->name }}
                                        @endif
                                    </p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @else
                    <div class="alert alert-info">
                        This student is not enrolled in any courses.
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('students.index') }}" class="btn btn-secondary">Back to Students</a>
                <a href="{{ route('students.edit', $student) }}" class="btn btn-primary">Edit Student</a>
            </div>
        </div>
    </div>
</div>
@endsection
