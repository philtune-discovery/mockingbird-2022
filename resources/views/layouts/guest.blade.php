<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;700;900&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">

</head>
<body class="t_body">
<div class="l_guest">
    <div>
        <a href="{{ route('welcome') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
    </div>

    <div class="c_guest_card">

    @yield('before')

    <!-- Session Status -->
        @if ($status = session('status'))
            <div class="c__status">
                {{ $status }}
            </div>
        @endif

    <!-- Validation Errors -->
        @if ($errors->any())
            <div class="c__errors">
                <p>
                    Whoops! Something went wrong.
                </p>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')

    </div>
</div>
</body>
</html>
