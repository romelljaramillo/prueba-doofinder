@csrf
<div class="flex items-center mb-4">
    <label for="active" class="uppercase text-gray-700 text-xs">Activar</label>
    @error('active')
        <x-forms.message-input :message="$message" />
    @enderror
    <input type="checkbox" id="active" name="active"
    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" 
    value="1" {{ (old('active', $product->active)) ? 'checked' : '' }} 
    >
</div>

<label class="uppercase text-gray-700 text-xs" for="title">Nombre</label>
@error('title')
    <x-forms.message-input :message="$message" />
@enderror
<input type="text" name="title" id="title" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('title', $product->title) }}">

<label class="uppercase text-gray-700 text-xs">ISBN</label>
@error('isbn')
    <x-forms.message-input :message="$message" />
@enderror
<input type="text" name="isbn" class="rounded border-gray-200 w-full mb-4" value="{{ old('isbn', $product->isbn) }}">

<label class="uppercase text-gray-700 text-xs">Precio</label>
@error('price')
    <x-forms.message-input :message="$message" />
@enderror
<input type="text" name="price" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('price', $product->price) }}">

<label class="uppercase text-gray-700 text-xs">Cantidad</label>
@error('quantity')
    <x-forms.message-input :message="$message" />
@enderror
<input type="text" name="quantity" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('quantity', $product->quantity) }}">

<label class="uppercase text-gray-700 text-xs">Catogoría</label>
@error('category_id')
    <x-forms.message-input :message="$message" />
@enderror
<select name="category_id" id="category_id" class="rounded border-gray-200 w-full mb-4">
    @foreach ($categories as $category)
        <option {{ $category->id == $product->category_id ? 'selected="selected"' : '' }} value="{{ $category->id }}">
            {{ $category->name }}
        </option>
    @endforeach
</select>

<label class="uppercase text-gray-700 text-xs">author</label>
@error('author')
    <x-forms.message-input :message="$message" />
@enderror
<input type="text" name="author" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('author', $product->author) }}">
    
<label class="uppercase text-gray-700 text-xs">Publisher</label>
@error('publisher')
    <x-forms.message-input :message="$message" />
@enderror
<input type="date" name="publisher" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('publisher', $product->publisher) }}">
    
<label class="uppercase text-gray-700 text-xs">Description</label>
@error('description')
    <x-forms.message-input :message="$message" />
@enderror
<textarea name="description" class="rounded border-gray-200 w-full mb-4" rows="5">
    {{ old('description', $product->description) }}
</textarea>

    
<label class="uppercase text-gray-700 text-xs">Imagen</label>
@error('image')
    <x-forms.message-input :message="$message" />
@enderror
<input type="file" name="image" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('image', $product->image) }}">

@if(file_exists(public_path('storage/img/p/'.$product->image)) && is_file(public_path('storage/img/p/'.$product->image)))
<div class="mt-4 overflow-hidden rounded-lg bg-white ring-1 ring-slate-900/5">
    <img class="w-full object-cover h-full sm:w-48" src="{{asset('storage/img/p/'.$product->image)}}" alt="{{ $product->title }}">
</div>
@endif

<div class="flex justify-between items-center">
    <a href="{{ route('products.index') }}" class="text-indigo-600">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>
