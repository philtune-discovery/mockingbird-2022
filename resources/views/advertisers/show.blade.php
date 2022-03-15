<?php
/**
 * @var Tag $tag
 * @var Collection $projects
 */
use App\Models\Project;use Illuminate\Database\Eloquent\Collection;use Spatie\Tags\Tag;
?>
@extends('layouts.app')

@section('main')

    <h1 class="title">
        Advertiser:&nbsp;
        <span class="sub">
            <?= $tag->name ?>
                <a class="u_utility_link" href="<?= route('advertisers.edit', $tag->slug) ?>">edit</a>
        </span>
    </h1>

    <div class="u_flex_middle_split">
        <div class="inner">
            <div>
                <h2 class="heading">
                    Projects <small>(<?= $projects->count() ?>)</small>
                </h2>
            </div>
            <div>
                <a class="button" href="<?= route('projects.create', [
                    'advertiser' => $tag->slug
                ]) ?>">Create New Project</a>
            </div>
        </div>
    </div>

    <?php $projects->each(function(Project $project) { ?>
    <div class="c_card u_flex_middle_split t--project">
        <div>
            <a class="link name" href="<?= route('projects.show', $project) ?>"><?= $project->name ?></a>
        </div>
        <div>
            <a class="c_avatar u_tooltip" href="/"><?= $project->user->getInitials() ?><span class="u_tooltip-text">Created by <?= $project->user->name?></span></a>
        </div>
    </div>
    <?php }) ?>
@endsection
