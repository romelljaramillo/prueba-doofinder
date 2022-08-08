<div class="w-full max-w-6xl rounded bg-white shadow-xl p-10 lg:p-20 mx-auto text-gray-800 relative md:text-left">
    <div class="md:flex items-center -mx-10">
        <div class="w-full md:w-1/2 px-10 mb-10 md:mb-0">
            <div class="relative">
                <img class="w-full relative z-10"
                    src="@if (file_exists(public_path('storage/img/p/' . $product->image))) {{ asset('storage/img/p/' . $product->image) }}@else{{ asset('images/no-image.jpg') }} @endif"
                    alt="{{ $product->title }}">
                <div class="border-4 border-yellow-200 absolute top-10 bottom-10 left-10 right-10 z-0"></div>
            </div>
        </div>
        <div class="w-full md:w-1/2 px-10">
            <div class="mb-10">
                <h1 class="font-bold uppercase text-2xl mb-5">{{ $product->title }}</h1>
                <p class="font-semibold">Author: {{$product->author}}</p>
                <p class="font-semibold">Publisher: {{$product->publisher}}</p>
                <p class="font-semibold">isbn: {{$product->isbn}}</p>
                <p class="text-sm mt-5">{{ $product->description }}
                    <a href="#"
                        class="opacity-50 text-gray-900 hover:opacity-100 inline-block text-xs leading-none border-b border-gray-900">
                        MORE <i class="mdi mdi-arrow-right"></i>
                    </a>
                </p>
            </div>
            <div>
                <div class="inline-block align-bottom mr-5">
                    <span class="text-2xl leading-none align-baseline">€</span>
                    <span class="font-bold text-5xl leading-none align-baseline">{{ $product->price }}</span>
                </div>
                <div class="inline-block align-bottom">
                    <button
                        class="bg-yellow-300 opacity-75 hover:opacity-100 text-yellow-900 hover:text-gray-900 rounded-full px-10 py-2 font-semibold">
                        <i class="mdi mdi-cart -ml-2 mr-2"></i> BUY NOW</button>
                </div>
            </div>
        </div>
    </div>
</div>
