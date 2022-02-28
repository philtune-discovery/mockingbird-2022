<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiClientController extends Controller
{

    // axios.get('/api/clients')
    public function index()
    {
        return Client::paginate();
    }

    // axios.post('/api/clients', { name: "Client Name" })
    public function store(Request $request):Client
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->save();

        return $client;
    }

    // axios.get('/api/clients/{client}')
    public function show(Client $client):Client
    {
        return $client;
    }

    // axios.patch('/api/clients/{client}', { name: "Client Name" })
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $client_name = $client->name;

        $client->name = $request->name;
        $client->save();

        return response([
            'status' => 'updated Client',
            'from'   => $client_name,
            'to'     => $request->name,
        ]);
    }

    // axios.post('/api/clients/{client}/campaigns', { name: "Campaign Name" })
    public function store_campaign(Client $client, Request $request):Model
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $campaign = $client->campaigns()->create([
            'name' => $request->name,
        ]);

        return $campaign;
    }

    // axios.delete('/api/clients/{client}')
    public function destroy(Client $client)
    {
        $client->delete();

        return response([], 204);
    }
}
