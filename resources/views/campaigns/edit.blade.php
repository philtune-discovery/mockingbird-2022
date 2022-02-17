<?php
/**
 * @var \App\Models\Campaign $campaign
 */
use App\Models\Client;

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
                            <label for="clients" class="block font-medium text-sm text-gray-700">Clients</label>
                            <select id="clients" name="clients[]" multiple>
                                <?php Client::all()->each(function (Client $client) use ($campaign) { ?>
                                <option
                                    value="{{ $client->id }}" {{ $campaign->clients->contains($client) ? 'selected' : '' }}>{{ $client->name }}</option>
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
