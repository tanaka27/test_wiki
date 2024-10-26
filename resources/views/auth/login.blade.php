@extends('layouts.app')

@section('title', 'Login')
@section('custom_css',)
<link rel="stylesheet" href="{{ asset('css/auth.css') }}">

@endsection
@section('content')
    <h1>Login</h1>
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <label for="email">Email:</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
            @error('email')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="password">Password:</label>
            <input id="password" type="password" name="password" required>
            @error('password')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <div>
            <label for="remember_me">
                <input type="checkbox" name="remember" id="remember_me">
                Remember me
            </label>
        </div>

        <button type="submit">Login</button>
    </form>
    <p>Don't have an account? <a href="{{ route('register') }}">Register here</a></p>
@endsection
