<?php
use Illuminate\Support\Facades\Storage;
?>
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Create New Image
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <form method="POST" action="{{ route('images.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div>
                            <x-laravel.label for="images" value="Images"/>
                            <x-laravel.input id="images" type="file" name="images[]" multiple/>
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
