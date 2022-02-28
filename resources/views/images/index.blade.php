<?php
use App\Models\Image;use Illuminate\Support\Facades\Storage;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Images
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Thumb</th>
                            <th>Label</th>
                            <th>Size</th>
                            <th>Project</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ( Image::all() as $image ) : ?>
                        <tr>
                            <td>
                                <a href="{{ route('images.show', $image) }}">
                                    <img src="<?= Storage::disk('s3')->url($image->thumb_path) ?>" alt="" width="50"/>
                                </a>
                            </td>
                            <th>
                                <a href="{{ route('images.show', $image) }}"><?= $image->label ?></a>
                            </th>
                            <td>
                                <?= round(Storage::disk('s3')->size($image->path) / 1000) ?> KB
                            </td>
                            <td>
                                {{ $image->project->campaign->clients()->first()->name }} >
                                {{ $image->project->campaign->name }} >
                                {{ $image->project->name }}
                            </td>
                            <td>
                                {{ $image->user->name }}
                            </td>
                            <td>
                                <?= $image->created_at ?>
                            </td>
                            <td>
                                <?= $image->updated_at ?>
                            </td>
                            <td>
                                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                   href="{{ route('images.show', $image) }}">
                                    Show
                                </a>
                                <form method="POST" action="{{ route('images.destroy', $image) }}"
                                      class="inline-flex">
                                    @method('DELETE')
                                    @csrf
                                    <x-button>Delete</x-button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <p>
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                           href="{{ route('images.create') }}">
                            Create New Image
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
