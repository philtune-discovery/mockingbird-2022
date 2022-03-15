<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use App\Models\Project;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Tags\Tag;

class AdvertiserController extends Controller
{

    public function index(Request $request)
    {
        /** @var Builder $tagsBuilder */
        $tagsBuilder = Tag::withType('advertiser');

        $orderByRecent = $request->input('orderBy') === 'recent';

        if ( $search = $request->input('search') ) {
            $tagsBuilder = $tagsBuilder->where(DB::raw('UPPER(json_extract(`name`, \'$."en"\'))'), 'like', '%' . strtoupper($search) . '%');
        }

        if ( $orderByRecent ) {
            $tags = $tagsBuilder
                ->orderBy('created_at')->get();
        } else {
            $tags = $tagsBuilder
                ->get()->sortBy('name')
                ->reduce(function (Collection $tags, Tag $tag) {
                    $startsWith = substr($tag->name, 0, 1);
                    if ( !$tags->has($startsWith) ) {
                        $tags->put($startsWith, collect());
                    }
                    $tags[$startsWith]->add($tag);
                    return $tags;
                }, collect());
        }

        $switcherView = view('components.switcher', [
            'arr' => [
                [
                    'Order by name',
                    route('advertisers.index', [
                        'orderBy' => 'name',
                        'search'  => request('search')
                    ]),
                    !$orderByRecent
                ],
                [
                    'Order by recent',
                    route('advertisers.index', [
                        'orderBy' => 'recent',
                        'search'  => request('search')
                    ]),
                    $orderByRecent
                ],
            ]
        ]);

        return view('advertisers.index', compact('tags', 'orderByRecent', 'switcherView'));
    }

    public function create()
    {
        return view('advertisers.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $tag = Tag::findOrCreate($request->name, 'advertiser');

        return redirect()->route('advertisers.show', $tag);
    }

    public function show(Tag $tag)
    {
        if ( !$tag->exists ) {
            return redirect()->route('advertisers.index');
        }

        return view('advertisers.show', [
            'tag'      => $tag,
            'projects' => Project::withAdvertiser($tag)->get()
        ]);
    }

    public function edit(Tag $tag)
    {
        if ( !$tag->exists ) {
            return redirect()->route('advertisers.index');
        }

        return view('advertisers.edit', compact('tag'));
    }

    public function update(Request $request, Tag $tag):RedirectResponse
    {
        if ( !$tag->exists ) {
            return redirect()->route('advertisers.index');
        }

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $tag->name = $request->name;
        $tag->save();

        return redirect()->route('advertisers.show', $tag->slug);
    }

    public function destroy(Tag $tag):RedirectResponse
    {
        if ( !$tag->exists ) {
            return redirect()->route('advertisers.index');
        }

        Project::withAdvertiser($tag)
               ->get()
               ->each(function (Project $project) use ($tag) {
                   $project->detachTag($tag);
               });

        $tag->delete();

        return redirect()->route('advertisers.index');
    }

    public function create_campaign(Advertiser $advertiser)
    {
        return view('advertisers.create_campaign', compact('advertiser'));
    }

    public function store_campaign(Advertiser $advertiser, Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $campaign = $advertiser->campaigns()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('campaigns.show', $campaign);
    }
}
