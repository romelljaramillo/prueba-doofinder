@csrf
<div class="flex items-center mb-4">
    <label for="active" class="uppercase text-gray-700 text-xs">Activar</label>
    @error('active')
        <x-forms.message-input :message="$message" />
    @enderror
    <input type="checkbox" id="active" name="active"
    class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300" 
    value="1" {{ (old('active', $category->active)) ? 'checked' : '' }} 
    >
</div>

<label class="uppercase text-gray-700 text-xs" for="name">Nombre</label>
@error('name')
    <x-forms.message-input :message="$message" />
@enderror
<input type="text" name="name" id="name" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('name', $category->name) }}">


<label class="uppercase text-gray-700 text-xs">Catogoría</label>
@error('parent_id')
    <x-forms.message-input :message="$message" />
@enderror
<select name="parent_id" id="parent_id" class="rounded border-gray-200 w-full mb-4">
    @foreach ($categories as $item)
        <option {{ $item->id == $category->parent_id ? 'selected="selected"' : '' }} value="{{ $item->id }}">
            {{ $item->name }}
        </option>
    @endforeach
</select>

<label class="uppercase text-gray-700 text-xs">Description</label>
@error('description')
    <x-forms.message-input :message="$message" />
@enderror
<textarea name="description" class="rounded border-gray-200 w-full mb-4" rows="5">
    {{ old('description', $category->description) }}
</textarea>

<label class="uppercase text-gray-700 text-xs">Imagen</label>
@error('image')
    <x-forms.message-input :message="$message" />
@enderror
<input type="file" name="image" class="rounded border-gray-200 w-full mb-4"
    value="{{ old('image', $category->image) }}">

@if(file_exists(public_path('storage/img/c/'.$category->image)) && is_file(public_path('storage/img/c/'.$category->image)))
<div class="mt-4 overflow-hidden rounded-lg bg-white ring-1 ring-slate-900/5">
    <img class="w-full object-cover h-full sm:w-48" src="{{asset('storage/img/c/'.$category->image)}}" alt="{{ $category->title }}">
</div>
@endif

<div class="flex justify-between items-center">
    <a href="{{ route('categories.index') }}" class="text-indigo-600">Volver</a>
    <input type="submit" value="Enviar" class="bg-gray-800 text-white rounded px-4 py-2">
</div>