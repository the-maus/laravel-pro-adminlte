@extends('layouts.default')
@section('page-title', 'Add user')

@section('content')
    @session('status')
        <div class="alert alert-success">
            {{ $value }}
        </div>
    @endsession
    <form action="{{ route('users.update', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label class="form-label">Name</label>
            <input 
                value="{{ old('name') ?? $user->name }}" 
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
                value="{{ old('email') ?? $user->email }}" 
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
        <button type="submit" class="btn btn-primary">Edit</button>
    </form>
@endsection
