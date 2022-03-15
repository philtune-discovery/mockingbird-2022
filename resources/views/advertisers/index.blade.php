<?php
/**
 * @var Collection $tags
 * @var boolean $orderByRecent
 * @var View $switcherView
 */
use Illuminate\{Contracts\View\View, Support\Collection};use Spatie\Tags\Tag;
?>


@extends('layouts.app')

@section('main')

    <h1 class="title">
        Advertisers
    </h1>

    <div class="c_card">

        <div class="l__topbar">
            <div>

                <form class="c_form" method="GET" action="">
                    <div class="inline_row">
                        <label class="label" for="search_advertisers">Search Advertisers</label>
                        <input class="text" type="search" id="search_advertisers" name="search"
                               value="<?= request('search') ?>"/>
                        <input type="hidden" name="orderBy" value="<?= request('orderBy') ?>">
                    </div>
                </form>

            </div>
            <div>
                <?= $switcherView ?>
            </div>
            <div>

                <a class="u_button" href="<?= route('advertisers.create') ?>">Create New Advertiser</a>

            </div>
        </div>

        <?php if ($orderByRecent) : ?>
        <h2 class="heading"><?= $tags->count() ?> results</h2>
        <ul class="tag_list">
            <?php $tags->each(function(Tag $tag) { ?>
            <li>
                <a class="u_advertiser_tag"
                   href="<?= route('advertisers.show', $tag->slug) ?>"
                   data-title="<?= $tag->created_at->format('M j, \'y g:ia') ?>"><?= $tag->name ?></a>
            </li>
            <?php }) ?>
        </ul>
        <?php else : ?>
        <?php $tags->each(function(Collection $tagCollection, $startsWith) { ?>
        <h2 class="heading"><?= $startsWith ?> <small>(<?= $tagCollection->count() ?>)</small></h2>
        <ul class="tag_list">
            <?php $tagCollection->each(function(Tag $tag) { ?>
            <li>
                <a class="u_advertiser_tag"
                   href="<?= route('advertisers.show', $tag->slug) ?>"><?= $tag->name ?></a>
            </li>
            <?php }) ?>
        </ul>
        <?php }) ?>
        <?php endif  ?>
    </div>

@endsection
