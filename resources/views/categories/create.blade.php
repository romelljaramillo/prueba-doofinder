<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	{{ __('Category') }}
        </h2>
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('categories.store') }}" enctype="multipart/form-data" method="POST">
            @include('categories._form')
        </form>
    </x-slot>
</x-app-layout>