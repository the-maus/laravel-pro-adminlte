@extends('layouts.default')
@section('page-title', 'Add user')

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input 
                value="{{ old('name') }}" 
                type="text" 
                class="form-control @error('name') is-invalid @enderror" 
                name="name"
            >
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">E-mail</label>
            <input 
                value="{{ old('email') }}" 
                type="email" 
                class="form-control @error('email') is-invalid @enderror" 
                name="email"
            >
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label class="form-label">Password</label>
            <input 
                value="" 
                type="password" 
                class="form-control @error('password') is-invalid @enderror" 
                name="password"
            >
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Add</button>
    </form>
@endsection
