<?php

namespace App\Http\Controllers;

use App\Models\Campaign;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CampaignController extends Controller
{
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('campaigns.index');
    }

    public function create()
    {
        return view('campaigns.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $campaign = new Campaign();
        $campaign->name = $request->name;
        $campaign->save();

        return redirect()->route('campaigns.show', $campaign);
    }

    public function show(Campaign $campaign)
    {
        return view('campaigns.show', compact('campaign'));
    }

    public function edit(Campaign $campaign)
    {
        return view('campaigns.edit', compact('campaign'));
    }

    public function update(Request $request, Campaign $campaign):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);
        $campaign->name = $request->name;
        $campaign->advertisers()->sync($request->advertisers);

        $campaign->save();


        return redirect()->route('campaigns.show', $campaign);
    }

    public function create_project(Campaign $campaign)
    {
        return view('campaigns.create_project', compact('campaign'));
    }

    public function store_project(Campaign $campaign, Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $project = $campaign->projects()->create([
            'name'       => $request->name,
            'created_by' => $request->user()->id
        ]);

        return redirect()->route('projects.show', $project);
    }

    public function destroy(Campaign $campaign):RedirectResponse
    {
        $campaign->delete();

        return redirect()->route('campaigns.index');
    }
}
