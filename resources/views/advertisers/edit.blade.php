<?php
use Spatie\Tags\Tag;

/**
 * @var Tag $tag
 */
?>
@extends('layouts.app')

@section('main')

    <h1 class="title">
        Update Advertiser:&nbsp;
        <span class="sub"><?= $tag->name ?></span>
    </h1>

    <div class="l_flex_middle_center">

        <div class="c_card">

            <form class="c_form" method="POST" action="<?= route('advertisers.update', $tag->slug) ?>">
                @method('PATCH')
                @csrf

                <div class="stack_row">
                    <label for="name" class="label">Name</label>

                    <input id="name" class="text" type="text" name="name" value="<?= $tag->name ?>" required autofocus/>
                </div>

                <div class="stack_row l--submit">
                    <button type="submit" class="button">Update</button>
                </div>
            </form>
            <form class="c_form" method="POST" action="<?= route('advertisers.destroy', $tag->slug) ?>">
                @method('DELETE')
                @csrf

                <div class="stack_row l--submit">
                    <button type="submit" class="button delete">Delete</button>
                </div>
            </form>

        </div>

    </div>

@endsection
