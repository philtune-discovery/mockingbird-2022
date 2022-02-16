<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Tinify\Source;
use Tinify\Tinify;

class ImageController extends Controller
{

    public function __construct()
    {
        Tinify::setKey(env('TINIFY_API_KEY'));
    }

    public function index()
    {
        return view('images.index');
    }

    public function create()
    {
        return view('images.create');
    }

    public function store(Request $request):RedirectResponse
    {
        $request->validate([
            'images'   => 'required',
            'images.*' => 'mimes:jpeg,jpg,png,gif,webp|max:5000000'
        ]);
        if ( $request->hasFile('images') ) {
            array_map(function (UploadedFile $uploadedFile) {
                $path = Str::random() . '.' . $uploadedFile->extension();
                $thumb_path = Str::random() . '.' . $uploadedFile->extension();
                $source = Source::fromBuffer($uploadedFile->getContent());
                $thumb_path_contents = $source->resize([
                    'method' => 'thumb',
                    'width'  => 200,
                    'height' => 200
                ])->toBuffer();
                Storage::put($path, $source->toBuffer(), 'public');
                Storage::put($thumb_path, $thumb_path_contents, 'public');

                $image = new Image();
                $image->project_id = 999;
                $image->path = $path;
                $image->thumb_path = $thumb_path;
                $image->pos = 0;
                $image->user_id = Auth::id();
                $image->save();
            }, $request->file('images'));
        }
        return redirect()->route('images.index');
    }

    public function show(Image $image)
    {
        return view('images.show', compact('image'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function edit(Image $image)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Image $image)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Image $image
     * @return \Illuminate\Http\Response
     */
    public function destroy(Image $image)
    {
        //
    }
}
