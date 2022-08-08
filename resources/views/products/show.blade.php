<x-guest-layout>
    <x-slot name="header">
       	<h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __($product->title) }}
		</h2>
    </x-slot>
    <x-product-show :product="$product" />
</x-guest-layout>
