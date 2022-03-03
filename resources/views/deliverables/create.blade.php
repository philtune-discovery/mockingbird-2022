<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Deliverable
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="font-medium text-red-600">
                            {{ __('Whoops! Something went wrong.') }}
                        </div>

                        <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <form method="POST" action="{{ route('deliverables.store') }}">
                        @csrf

                        <div>
                            <label for="text" class="block font-medium text-sm text-gray-700">Content</label>
                            <textarea id="text" name="text"></textarea>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-laravel.button>Create</x-laravel.button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
