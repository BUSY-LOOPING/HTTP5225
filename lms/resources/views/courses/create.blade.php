@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-2">
            Add New Course
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('courses.store') }}" method="POST">
            @csrf
            
            <div class="form-group mb-3">
                <label for="name">Course Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name') }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="code">Course Code</label>
                <input type="text" class="form-control @error('code') is-invalid @enderror" 
                       id="code" name="code" value="{{ old('code') }}" required>
                @error('code')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="description">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" 
                          id="description" name="description" rows="3">{{ old('description') }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="credits">Credits</label>
                <input type="number" class="form-control @error('credits') is-invalid @enderror" 
                       id="credits" name="credits" value="{{ old('credits') }}" min="1" required>
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
                        <option value="{{ $professor->id }}" {{ old('professor_id') == $professor->id ? 'selected' : '' }}>
                            {{ $professor->name }} ({{ $professor->department }})
                        </option>
                    @endforeach
                </select>
                @error('professor_id')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                @if($professors->count() == 0)
                    <div class="alert alert-warning mt-2">
                        No available professors. <a href="{{ route('professors.create') }}">Add a professor first</a>
                    </div>
                @endif
            </div>
            
            <button type="submit" class="btn btn-success">Create Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
