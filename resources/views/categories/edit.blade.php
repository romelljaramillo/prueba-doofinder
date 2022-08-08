<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Category') }}
        </h2>
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('categories.update', $category) }}" enctype="multipart/form-data" method="POST">
            @method('PUT')
            @include('categories._form')
        </form>
    </x-slot>
</x-app-layout>