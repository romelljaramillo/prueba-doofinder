<x-guest-layout>
    <x-slot name="header">
       	<h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Home') }}
		</h2>
    </x-slot>

    <div class="text-center">
        <h1 class="text-3xl text-gray-700 mb-2 uppercase">Últimos Books</h1>
    </div>

    <x-product-list :products="$products" />
    
    <div class="mt-5">
        {{ $products->links() }}
    </div>
</x-guest-layout>
