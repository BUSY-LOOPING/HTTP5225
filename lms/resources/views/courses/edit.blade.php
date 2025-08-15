@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-4">
            Edit Course
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('courses.update', $course) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="name">Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $course->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="code">Course Code</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" 
                       id="code" name="code" value="{{ old('code', $course->code) }}" required>
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description', $course->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="credits">Credits</label>
                <input type="number" class="form-control @error('credits') is-invalid @enderror" 
                       id="credits" name="credits" value="{{ old('credits', $course->credits) }}" min="1" required>
                @error('credits')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="professor_id">Select Professor</label>
                <select class="form-control @error('professor_id') is-invalid @enderror" 
                        id="professor_id" name="professor_id" required>
                    <option value="">Choose a Professor</option>
                    @foreach($professors as $professor)
                        <option value="{{ $professor->id }}" 
                                {{ old('professor_id', $course->professor_id) == $professor->id ? 'selected' : '' }}>
                            {{ $professor->name }} ({{ $professor->department }})
                        </option>
                    @endforeach
                </select>
                @error('professor_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
