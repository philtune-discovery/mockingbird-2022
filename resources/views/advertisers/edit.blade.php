<?php
/**
 * @var Advertiser $advertiser
 */

use App\Models\Advertiser;

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Advertiser: {{ $advertiser->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('advertisers.update', $advertiser) }}">
                        @method('PATCH')
                        @csrf
                        <div>
                            <x-label for="name" :value="__('Name')"/>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="$advertiser->name" required autofocus/>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <a class="inline-flex items-center px-4 py-2 bg-gray-100 border border-transparent rounded-md font-semibold text-xs text-gray-900 uppercase tracking-widest active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150 mr-2" href="{{ route('advertisers.show', $advertiser) }}">Cancel</a>
                            <x-button>Update</x-button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
