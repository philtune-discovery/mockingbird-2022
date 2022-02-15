<?php
use App\Models\Advertiser;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Advertisers
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <?php foreach ( Advertiser::all() as $advertiser ) : ?>
                        <tr>
                            <td>
                                <a href="{{ route('advertisers.show', $advertiser) }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <?= $advertiser->name ?>
                                </a>
                            </td>
                            <td>
                                <?= $advertiser->created_at ?>
                            </td>
                            <td>
                                <?= $advertiser->updated_at ?>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <p>
                        <a href="{{ route('advertisers.create') }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Create New Advertiser
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
