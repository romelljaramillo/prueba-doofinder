<form action="{{ route('home') }}" class="flex-grow" method="GET">
    <input type="text" name="search" placeholder="Buscar" value="{{ request('search') }}" 
    class="bg-gray-700 text-white  py-2 px-4 sm:w-1/2"
    >
</form>