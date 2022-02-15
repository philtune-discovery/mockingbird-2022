<?php
/**
 * @var \App\Models\Campaign $campaign
 */
use App\Models\Advertiser;

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Campaign: {{ $campaign->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('campaigns.update', $campaign) }}">
                        @method('PATCH')
                        @csrf
                        <div>
                            <x-label for="name" value="Name"/>
                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                     :value="$campaign->name" required autofocus/>
                        </div>
                        <div>
                            <label for="advertisers" class="block font-medium text-sm text-gray-700">Advertisers</label>
                            <select id="advertisers" name="advertisers[]" multiple>
                                <?php Advertiser::all()->each(function (Advertiser $advertiser) use ($campaign) { ?>
                                <option
                                    value="{{ $advertiser->id }}" {{ $campaign->advertisers->contains($advertiser) ? 'selected' : '' }}>{{ $advertiser->name }}</option>
                                <?php }) ?>
                            </select>
                        </div>
                        <div class="flex items-center justify-start mt-4">
                            <x-button>Update</x-button>
                        </div>
                    </form>

                    <form method="POST" action="{{ route('campaigns.destroy', $campaign) }}">
                        @method('DELETE')
                        @csrf
                        <x-button>Delete</x-button>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
