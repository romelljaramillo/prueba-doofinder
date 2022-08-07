<x-app-layout>
    <x-slot name="header">
       	<h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center justify-between">
            {{ __('Categories') }}

            <a href="{{ route('categories.create') }}" class="text-xs bg-gray-800 text-white rounded px-2 py-1">Crear</a>
		</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                	
                	<table class="mb-4">
                        @foreach($categories as $category)
                        <tr class="border-b border-gray-200 text-sm">
                            <td class="px-6 py-4">{{ $category->id }}</td>
                            <td class="px-6 py-4">{{ $category->name }}</td>
                            <td class="px-6 py-4">
                                @if ($category->active)
                                    <svg class="text-green-500 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                @else
                                    <svg class="text-red-500 w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
                                @endif
                            </td>
                            <td class="px-6 py-4">{{ $category->created_at->format('d-m-Y') }}</td>
                            <td class="px-6 py-4">{{ $category->updated_at->format('d-m-Y') }}</td>
                            
                            <td class="px-6 py-4">
                                <a href="{{ route('categories.edit', $category) }}" class="text-indigo-600">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                            	<form action="{{ route('categories.destroy', $category) }}" method="POST">
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

                    {{ $categories->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
