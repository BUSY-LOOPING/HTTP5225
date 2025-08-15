@extends('layouts/admin')
@section('content')
<div class="row">
    <div class="col">
        <h1 class="display-4">
            Edit Professor
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('professors.update', $professor) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group mb-3">
                <label for="name">Name</label>
                <input type="text" class="form-control @error('name') is-invalid @enderror" 
                       id="name" name="name" value="{{ old('name', $professor->name) }}" required>
                @error('name')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" 
                       id="email" name="email" value="{{ old('email', $professor->email) }}" required>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <div class="form-group mb-3">
                <label for="department">Department</label>
                <input type="text" class="form-control @error('department') is-invalid @enderror" 
                       id="department" name="department" value="{{ old('department', $professor->department) }}" required>
                @error('department')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            
            <button type="submit" class="btn btn-primary">Update Professor</button>
            <a href="{{ route('professors.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
