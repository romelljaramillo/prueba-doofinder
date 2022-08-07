<div class="grid grid-cols-2 md:grid-cols-4 xl:grid-cols-5 gap-4 mt-8">
    @foreach($products as $product)    
        <x-product-card :product="$product" />
    @endforeach
</div>
