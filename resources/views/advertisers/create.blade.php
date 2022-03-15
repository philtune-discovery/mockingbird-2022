@extends('layouts.app')

@section('main')

    <h1 class="title">
        Create New Advertiser
    </h1>

    <div class="l_flex_middle_center">

        <div class="c_card">

            <form class="c_form" method="POST" action="{{ route('advertisers.store') }}">
                @csrf

                <div class="stack_row">
                    <label for="name" class="label">Name</label>

                    <input id="name" class="text" type="text" name="name" value="{{old('name')}}" required autofocus/>
                </div>

                <div class="stack_row l--submit">
                    <button type="submit" class="button">Create</button>
                </div>
            </form>

        </div>

    </div>

@endsection
