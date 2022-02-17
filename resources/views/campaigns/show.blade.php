<?php
/**
 * @var \App\Models\Campaign $campaign
 */
use App\Models\Client;use App\Models\Project;

?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Campaign: {{ $campaign->name }}
            <a class="underline text-sm text-gray-600 hover:text-gray-900"
               href="{{ route('campaigns.edit', $campaign) }}">edit</a>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <table>
                        <tr>
                            <th>Created at:</th>
                            <td>{{ $campaign->created_at }}</td>
                        </tr>
                        <tr>
                            <th>Updated at:</th>
                            <td>{{ $campaign->updated_at }}</td>
                        </tr>
                        <tr>
                            <th>Clients:</th>
                            <td>
                                <ul>
                                    <?php $campaign->clients()->each(function(Client $client) { ?>
                                    <li>
                                        <a href="{{ route('clients.show', $client) }}"
                                           class="block pl-3 pr-4 py-2 border-l-4 border-transparent text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out">{{ $client->name }}</a>
                                    </li>
                                    <?php }) ?>
                                </ul>
                            </td>
                        </tr>
                    </table><h2>Projects</h2>
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                        </tr>
                        </thead>
                        <?php $campaign->projects->each(function(Project $project) { ?>
                        <tr>
                            <td>
                                <a href="{{ route('projects.show', $project) }}"
                                   class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                                    <?= $project->name ?>
                                </a>
                            </td>
                            <td>
                                <?= $project->created_at ?>
                            </td>
                            <td>
                                <?= $project->updated_at ?>
                            </td>
                        </tr>
                        <?php }); ?>
                    </table>
                    <p>
                        <a href="{{ route('campaigns.create_project', $campaign) }}"
                           class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150">
                            Add New Project
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
