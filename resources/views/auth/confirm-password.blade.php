@extends('layouts.guest')

@section('before')
    <p>
        This is a secure area of the application. Please confirm your password before continuing.
    </p>
@endsection

@section('content')

    <form method="POST" action="{{ route('password.confirm') }}" class="c_form">
    @csrf

    <!-- Password -->
        <div class="form_row">
            <label for="password" class="label">Password</label>

            <input id="password" class="text"
                     type="password"
                     name="password"
                     required autocomplete="current-password"/>
        </div>

        <div class="form_row l--submit">
            <button type="submit" class="button">Confirm</button>
        </div>
    </form>

@endsection
