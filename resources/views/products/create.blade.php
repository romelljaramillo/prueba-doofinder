<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        	{{ __('Product') }}
        </h2>
    </x-slot>

    <x-slot name="content">
        <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="POST">
            @include('products._form')
        </form>
    </x-slot>
</x-app-layout>