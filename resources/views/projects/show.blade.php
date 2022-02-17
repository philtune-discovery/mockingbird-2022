<?php
/**
 * @var Project $project
 */
use App\Models\{Client, Campaign, Project};

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Campaign: {{ $project->campaign->name }} > Project: {{ $project->name }}
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
               href="{{ route('projects.edit', $project) }}">edit</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table>
                        <tr>
                            <th>Created at:</th>
                            <td>{{ $project->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated at:</th>
                            <td>{{ $project->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Clients:</th>
                            <td>
                                <ul>
                                    <?php $project->campaign->clients()->each(function(Client $client) { ?>
                                    <li>
                                        <a href="{{ route('clients.show', $client) }}"
                                           class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">{{ $client->name }}</a>
                                    </li>
                                    <?php }) ?>
                                </ul>
                            </td>
                        </tr>
                    </table>
                    <p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
