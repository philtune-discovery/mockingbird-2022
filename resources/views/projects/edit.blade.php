<?php
/**
 * @var Project $project
 */
use App\Models\{Advertiser, Campaign, Project};

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Campaign: {{ $project->campaign->name }} > Project: {{ $project->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('projects.update', $project) }}">
                        @method('PATCH')
                        @csrf
                        <div>
                            <x-laravel.label for="name" value="Name"/>
                            <x-laravel.input id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="$project->name" required autofocus/>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <a class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2" href="{{ route('projects.show', $project) }}">Cancel</a>
                            <x-laravel.button>Update</x-laravel.button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('projects.destroy', $project) }}">
                        @method('DELETE')
                        @csrf
                        <x-laravel.button>Delete</x-laravel.button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
