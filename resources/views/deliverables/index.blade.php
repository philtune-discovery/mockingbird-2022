<?php
use App\Models\Deliverable;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Deliverables
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <table>
                        <thead>
                        <tr>
                            <th>Deliverable</th>
                            <th>Created By</th>
                            <th>Created At</th>
                            <th>Updated At</th>
                            <th>Actions</th>
                        </tr>
                        </thead>
                        <?php foreach ( Deliverable::all() as $deliverable ) : ?>
                        <tr>
                            <td>
                                <label>
                                    <textarea disabled><?= $deliverable->text ?></textarea>
                                </label>
                            </td>
                            <td>
                                <?= $deliverable->user->name ?>
                            </td>
                            <td>
                                <?= $deliverable->created_at ?>
                            </td>
                            <td>
                                <?= $deliverable->updated_at ?>
                            </td>
                            <td>
                                <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                   href="<?= route('deliverables.show', $deliverable) ?>">
                                    Show
                                </a>
                                <form method="POST" action="<?= route('deliverables.destroy', $deliverable) ?>"
                                      class="inline-flex">
                                    @method('DELETE')
                                    @csrf
                                    <x-laravel.button>Delete</x-laravel.button>
                                </form>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                    <p>
                        <a class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                           href="<?= route('deliverables.create') ?>">
                            Create New Deliverable
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
