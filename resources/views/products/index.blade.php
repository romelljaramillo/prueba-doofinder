<x-app-layout>
    <x-slot name="header">
       	<h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Products') }}

            <a href="{{ route('products.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
		</h2>
    </x-slot>

    <x-slot name="content">
        <table class="mb-4">
            @foreach($products as $product)
            <tr class="border-b border-gray-200 text-sm">
                <td class="px-6 py-4">{{ $product->id }}</td>
                {{-- <td class="px-6 py-4">{{ $product->user->name }}</td> --}}
                <td class="px-6 py-4">
                    <img src="@if(file_exists(public_path('storage/img/p/'.$product->image))){{asset('storage/img/p/'.$product->image)}}@else{{asset('images/no-image.jpg')}}@endif" 
                    alt="{{ $product->title }}">
                </td>
                <td class="px-6 py-4">{{ $product->title }}</td>
                <td class="px-6 py-4">{{ $product->author }}</td>
                <td class="px-6 py-4">{{ $product->isbn }}</td>
                <td class="px-6 py-4">{{ $product->price }}</td>
                <td class="px-6 py-4">
                    @if ($product->active)
                        <svg class="text-green-500 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                    @else
                        <svg class="text-red-500 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                    @endif
                </td>
                <td class="px-6 py-4">{{ $product->created_at->format('d-m-Y') }}</td>
                <td class="px-6 py-4">{{ $product->updated_at->format('d-m-Y') }}</td>
                <td class="px-6 py-4">
                    <a href="{{ route('products.edit', $product) }}" class="text-indigo-600">Editar</a>
                </td>
                <td class="px-6 py-4">
                    <form action="{{ route('products.destroy', $product) }}" method="POST">
                        @csrf 
                        @method('DELETE')

                        <input 
                            type="submit" 
                            value="Eliminar" 
                            class=" bg-gray-800 text-white rounded px-4 py-2" 
                            onclick="return confirm('¿Desea Eliminar?')"
                        >
                    </form>
                </td>
            </tr>
            @endforeach
        </table>

        {{ $products->links() }}
    </x-slot>

</x-app-layout>
