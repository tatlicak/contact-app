@extends('layouts.main')

@section('title', 'Contact App | Register')

@section('content')
<div class="auth-wrapper d-flex bg-light">
    <div class="col-md-4 m-auto">
        <div class="bg-white shadow-sm">
            <h1 class="border-bottom p-4">Register</h1>

            <div class="px-4 pt-4">

                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name</label>
                        <input type="text" class="form-control @error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" />
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name</label>
                        <input type="text" class="form-control @error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" />
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" />
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" />
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password Confirmation</label>
                        <input type="password" class="form-control" name="password_confirmation" />
                    </div>
                    <div class="mt-4 d-grid">
                        <button type="submit" class="btn btn-block btn-primary">Register</button>
                        <div class="text-center py-4 text-muted">
                            Already have account?
                            <a href="{{ route('login') }}" class="text-muted font-weight-bold text-decoration-none">Login</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection