<?php
/**
 * @var Advertiser $advertiser
 */
use App\Models\Advertiser;use App\Models\Campaign;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Advertiser: {{ $advertiser->name }}
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
               href="{{ route('advertisers.edit', $advertiser) }}">edit</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table>
                        <tr>
                            <th>Created at:</th>
                            <td>{{ $advertiser->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated at:</th>
                            <td>{{ $advertiser->updated_at }}</td>
                        </tr>
                    </table>
                    <h2>Campaigns</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <?php $advertiser->campaigns->each(function(Campaign $campaign) { ?>
                        <tr>
                            <td>
                                <a href="{{ route('campaigns.show', $campaign) }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <?= $campaign->name ?>
                                </a>
                            </td>
                            <td>
                                <?= $campaign->created_at ?>
                            </td>
                            <td>
                                <?= $campaign->updated_at ?>
                            </td>
                        </tr>
                        <?php }); ?>
                    </table>
                    <a href="{{ route('advertisers.create_campaign', $advertiser) }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                        Add New Campaign
                    </a>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
