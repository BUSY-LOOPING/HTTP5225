@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-4">
            Professor Details
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h3>{{ $professor->name }}</h3>
            </div>
            <div class="card-body">
                <p><strong>Email:</strong> {{ $professor->email }}</p>
                <p><strong>Department:</strong> {{ $professor->department }}</p>
                
                <h5 class="mt-4">Assigned Course:</h5>
                @if($professor->course)
                    <div class="card border-primary">
                        <div class="card-body">
                            <h6 class="card-title">{{ $professor->course->name }}</h6>
                            <p class="card-text">
                                <strong>Code:</strong> {{ $professor->course->code }}<br>
                                <strong>Credits:</strong> {{ $professor->course->credits }}<br>
                                <strong>Students Enrolled:</strong> {{ $professor->course->students->count() }}
                            </p>
                            <a href="{{ route('courses.show', $professor->course) }}" class="btn btn-sm btn-outline-primary">
                                View Course Details
                            </a>
                        </div>
                    </div>
                @else
                    <div class="alert alert-info">
                        This professor has no course assigned.
                    </div>
                @endif
            </div>
            <div class="card-footer">
                <a href="{{ route('professors.index') }}" class="btn btn-secondary">Back to Professors</a>
                <a href="{{ route('professors.edit', $professor) }}" class="btn btn-primary">Edit Professor</a>
            </div>
        </div>
    </div>
</div>
@endsection
