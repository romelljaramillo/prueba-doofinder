<div class="bg-white shadow-lg rounded-lg px-4 py-6 text-center">
    <a href="{{ route('product', $product->id) }}">
        <img class="rounded-md mb-2" 
        src="@if(file_exists(public_path('storage/img/p/'.$product->image))){{asset('storage/img/p/'.$product->image)}}@else{{asset('images/no-image.jpg')}}@endif" 
        alt="{{ $product->title }}">
        <h4 class="text-lg text-gray-600 truncate uppercase font-semibold">{{ $product->title }}</h4>
        <p class="text-md text-gray-500">{{ $product->excerpt }}</p>

        {{-- <img src="{{ $product->user->avatar }}" alt="{{ $product->user->name }}" class="rounded-full mx-auto mt-4 h-16 w-16"> --}}
    </a>
</div>