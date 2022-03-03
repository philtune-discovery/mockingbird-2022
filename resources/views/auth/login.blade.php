@extends('layouts.guest')

@section('content')

    <form method="POST" action="{{ route('login') }}" class="c_form">
    @csrf

    <!-- Email Address -->
        <div class="form_row">
            <label for="email" class="label">Email</label>

            <input id="email" class="text"
                   type="email"
                   name="email"
                   value="{{ old('email') }}"
                   required
                   autofocus/>
        </div>

        <!-- Password -->
        <div class="form_row">
            <label for="password" class="label">Password</label>

            <input id="password" class="text"
                   type="password"
                   name="password"
                   required
                   autocomplete="current-password"/>
        </div>

        <!-- Remember Me -->
        <div class="form_row">
            <label for="remember_me" class="label">
                <input id="remember_me" class="checkbox" type="checkbox"
                       data-class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       name="remember">
                <span>Remember me</span>
            </label>
        </div>

        <div class="form_row l--submit">
            <a class="link" href="{{ route('register') }}">Not Registered?</a>
            @if (Illuminate\Support\Facades\Route::has('password.request'))
                <a class="link" href="{{ route('password.request') }}">Forgot your password?</a>
            @endif

            <button type="submit" class="button">Log in</button>
        </div>
    </form>

@endsection
