@extends('layouts.guest')

@section('before')
    <p>
        Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we
        just emailed to you? If you didn't receive the email, we will gladly send you another.
    </p>
@endsection

@section('content')
    <div class="u_flex_middle_split c_form">

        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <button type="submit" class="button">Resend Verification Email</button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class="link">Log Out</button>
        </form>

    </div>
@endsection
