@extends('layouts.guest')

@section('content')

    <form method="POST" action="{{ route('register') }}" class="c_form">
    @csrf

    <!-- Name -->
        <div class="stack_row">
            <label for="name" class="label">Name</label>

            <input id="name"
                   class="text"
                   type="text"
                   name="name"
                   value="{{ old('name') }}"
                   required
                   autofocus/>
        </div>

        <!-- Email Address -->
        <div class="stack_row">
            <label for="email" class="label">Email</label>

            <input id="email" class="text" type="email" name="email" value="{{ old('email') }}" required/>
        </div>

        <!-- Password -->
        <div class="stack_row">
            <label for="password" class="label">Password</label>

            <input id="password" class="text"
                   type="password"
                   name="password"
                   required autocomplete="new-password"/>
        </div>

        <!-- Confirm Password -->
        <div class="stack_row">
            <label for="password_confirmation" class="label">Confirm Password</label>

            <input id="password_confirmation" class="text"
                   type="password"
                   name="password_confirmation" required/>
        </div>

        <div class="stack_row l--submit">
            <a class="link" href="{{ route('login') }}">Already registered?</a>

            <button type="submit" class="button">Register</button>
        </div>
    </form>

@endsection
