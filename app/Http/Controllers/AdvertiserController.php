<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class AdvertiserController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index()
    {
        return view('advertisers.index');
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

        $advertiser = new Advertiser();
        $advertiser->name = $request->name;
        $advertiser->save();

        return redirect()->route('advertisers.show', $advertiser);
    }

    public function show(Advertiser $advertiser)
    {
        return view('advertisers.show', compact('advertiser'));
    }

    public function edit(Advertiser $advertiser)
    {
        return view('advertisers.edit', compact('advertiser'));
    }

    public function update(Request $request, Advertiser $advertiser):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $advertiser->name = $request->name;
        $advertiser->save();

        return redirect()->route('advertisers.show', $advertiser);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Advertiser  $advertiser
     * @return \Illuminate\Http\Response
     */
    public function destroy(Advertiser $advertiser)
    {
        //
    }
}
