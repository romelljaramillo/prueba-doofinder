<nav class="bg-black border-b border-gray-100">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex items-center flex-grow gap-4">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('images/logo.png') }}" class="h-12">
                    </a>
                </div>

                <x-search />

                <div class="sm:flex sm:items-center sm:ml-6 text-white">
                    @if (Route::has('login'))
                        @auth
                            <a href="{{ route('dashboard') }}">Dashboard</a>
                        @else
                            <a href="{{ route('login') }}">Login</a>
                        @endif
                    @endif
                </div>
            </div>
        </div>
    </div>
</nav>
