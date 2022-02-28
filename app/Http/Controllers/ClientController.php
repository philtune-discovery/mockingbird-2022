<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function index()
    {
        return view('clients.index', ['clients' => Client::all()]);
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->save();

        return redirect()->route('clients.show', $client);
    }

    public function show(Client $client)
    {
        return view('clients.show', compact('client'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $client->name = $request->name;
        $client->save();

        return redirect()->route('clients.show', $client);
    }

    public function create_campaign(Client $client)
    {
        return view('clients.create_campaign', compact('client'));
    }

    public function store_campaign(Client $client, Request $request):RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $campaign = $client->campaigns()->create([
            'name' => $request->name,
        ]);

        return redirect()->route('campaigns.show', $campaign);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Client  $client
     * @return \Illuminate\Http\Response
     */
    public function destroy(Client $client)
    {
        //
    }
}
