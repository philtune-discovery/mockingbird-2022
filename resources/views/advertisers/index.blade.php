<?php /** @var Tag $advertisers */
use Spatie\Tags\Tag;

?>
@extends('layouts.app')

@section('main')

    <h1 class="title">
        Advertisers
    </h1>

    <table>
        <thead>
        <tr>
            <th>Name</th>
            <th>Slug</th>
            <th>Created At</th>
            <th>Updated At</th>
        </tr>
        </thead>
        <?php foreach ( $advertisers as $advertiser ) : ?>
        <tr>
            <td>
                <a href="<?= route('advertisers.show', $advertiser) ?>"><?= $advertiser->name ?></a>
            </td>
            <td>
                <?= $advertiser->slug ?>
            </td>
            <td>
                <?= $advertiser->created_at ?>
            </td>
            <td>
                <?= $advertiser->updated_at ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <p>
        <a href="<?= route('advertisers.create') ?>">Create New Advertiser</a>
    </p>

@endsection
