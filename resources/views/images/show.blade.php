<?php
/**
 * @var Image $image
 */
use App\Models\{Client, Campaign, Image};

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Image
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table>
                        <tr>
                            <th>Created at:</th>
                            <td>{{ $image->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated at:</th>
                            <td>{{ $image->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Project:</th>
                            <td>
                                {{ $image->project->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Campaign:</th>
                            <td>
                                {{ $image->project->campaign->name }}
                            </td>
                        </tr>
                        <tr>
                            <th>Clients:</th>
                            <td>
                                <ul>
                                    <?php $image->project->campaign->clients()->each(function(Client $client) { ?>
                                    <li>
                                        <a href="{{ route('clients.show', $client) }}"
                                           class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">{{ $client->name }}</a>
                                    </li>
                                    <?php }) ?>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Image:</th>
                            <td>
                                <img src="{{ $image->getPathUrl() }}" alt="" style="border:10px solid #ccc;"/>
                            </td>
                        </tr>
                    </table>
                    <p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
