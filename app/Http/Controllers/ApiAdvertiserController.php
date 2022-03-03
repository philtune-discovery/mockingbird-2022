<?php

namespace App\Http\Controllers;

use App\Models\Advertiser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class ApiAdvertiserController extends Controller
{

    // axios.get('/api/advertisers')
    public function index()
    {
        return Advertiser::paginate();
    }

    // axios.post('/api/advertisers', { name: "Advertiser Name" })
    public function store(Request $request):Advertiser
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $advertiser = new Advertiser();
        $advertiser->name = $request->name;
        $advertiser->save();

        return $advertiser;
    }

    // axios.get('/api/advertisers/{advertiser}')
    public function show(Advertiser $advertiser):Advertiser
    {
        return $advertiser;
    }

    // axios.patch('/api/advertisers/{advertiser}', { name: "Advertiser Name" })
    public function update(Request $request, Advertiser $advertiser)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $advertiser_name = $advertiser->name;

        $advertiser->name = $request->name;
        $advertiser->save();

        return response([
            'status' => 'updated Advertiser',
            'from'   => $advertiser_name,
            'to'     => $request->name,
        ]);
    }

    // axios.post('/api/advertisers/{advertiser}/campaigns', { name: "Campaign Name" })
    public function store_campaign(Advertiser $advertiser, Request $request):Model
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
        ]);

        $campaign = $advertiser->campaigns()->create([
            'name' => $request->name,
        ]);

        return $campaign;
    }

    // axios.delete('/api/advertisers/{advertiser}')
    public function destroy(Advertiser $advertiser)
    {
        $advertiser->delete();

        return response([], 204);
    }
}
