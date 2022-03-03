@extends('layouts.guest')

@section('before')
    <p>
        Forgot your password? No problem. Just let us know your email address and we will email you a password reset
        link that will allow you to choose a new one.
    </p>
@endsection

@section('content')

    <form method="POST" action="{{ route('password.email') }}" class="c_form">
    @csrf

    <!-- Email Address -->
        <div class="form_row">
            <label for="email" class="label">Email</label>

            <input id="email" class="text" type="email" name="email" value="{{old('email')}}" required
                   autofocus/>
        </div>

        <div class="form_row l--submit">
            <a class="link" href="{{ route('login') }}">Nevermind</a>

            <button type="submit" class="button">Email Password Reset Link</button>
        </div>
    </form>

@endsection
