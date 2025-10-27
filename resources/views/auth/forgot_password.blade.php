@extends('layouts.auth')

@section('body-class', 'login-page')

@section('content')
<div class="login-box">
    <div class="login-logo">
    <a href="../index2.html"><b>Admin</b>LTE</a>
    </div>
    <div class="card">
    <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <form action="{{ route('password.email') }}" method="post">
        @csrf
        <div class="input-group mb-3">
            <div class="input-group-text"><span class="bi bi-envelope"></span></div>
            <input type="email" name="email" value="{{ old('email') }}" class="form-control @error('email') is-invalid @enderror" placeholder="Email" />
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Send me the link</button>
        </div>
        </form>
        <div class="mt-2 text-center">
            <p class="mb-0">
            <a href="register.html" class="text-center">Back to login</a>
            </p>
        </div>
    </div>
    <!-- /.login-card-body -->
    </div>
</div>
@endsection