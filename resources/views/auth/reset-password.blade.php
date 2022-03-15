@extends('layouts.guest')

@section('content')

    <form method="POST" action="{{ route('password.update') }}" class="c_form">
    @csrf

    <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div class="stack_row">
            <label for="email" class="label">Email</label>

            <input id="email"
                   class="text"
                   type="email"
                   name="email"
                   value="{{old('email', $request->email)}}"
                   required
                   autofocus/>
        </div>

        <!-- Password -->
        <div class="stack_row">
            <label for="password" class="label">Password</label>

            <input id="password" class="text" type="password" name="password" required/>
        </div>

        <!-- Confirm Password -->
        <div class="stack_row">
            <label for="password_confirmation" class="label">Confirm Password</label>

            <input id="password_confirmation" class="text"
                   type="password"
                   name="password_confirmation" required/>
        </div>

        <div class="stack_row l--submit">
            <button type="submit" class="button">Reset Password</button>
        </div>
    </form>

@endsection
