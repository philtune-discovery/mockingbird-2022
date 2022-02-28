<?php

namespace App\Http\Controllers;

use App\Models\Deliverable;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeliverableController extends Controller
{

    public function index()
    {
        return view('deliverables.index');
    }

    public function create()
    {
        return view('deliverables.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'text' => 'required'
        ]);

        $deliverable = new Deliverable();
        $deliverable->project_id = 1;
        $deliverable->user_id = Auth::id();
        $deliverable->text = $request->text;
        $deliverable->save();

        return redirect()->route('deliverables.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function show(Deliverable $deliverable)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function edit(Deliverable $deliverable)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deliverable  $deliverable
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deliverable $deliverable)
    {
        //
    }

    public function destroy(Deliverable $deliverable):RedirectResponse
    {
        $deliverable->delete();

        return redirect()->route('deliverables.index');
    }
}
