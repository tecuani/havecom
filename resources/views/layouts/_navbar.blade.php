<nav class="bg-white text-gray-900 px-6 py-4 w-full fixed h-28 items-center">
    <div class="container mx-auto flex flex-wrap items-center w-2/3 justify-between">
        <div class="flex items-center font-extrabold">
            <a href="/" class="no-underline hover:no-underline">
                <img src="{{ asset('img/havecom.logo.png') }}" alt="HAVECOM">
            </a>
        </div>
        <div class="flex content-center justify-between">
            <ul class="list-reset flex justify-between flex-1 items-center">
                <li class="mr-3">
                    <a href="/" class="inline-block px-4 hover:text-blue-700 no-underline">INICIO</a>
                </li>
                <li class="mr-3">
                    <a href="{{ route('products.index') }}" class="inline-block  px-4 hover:text-blue-700 no-underline">PRODUCTOS</a>
                </li>
                <li class="mr-3">
                    <a href="{{ route('pages.consultancy') }}" class="inline-block px-4 hover:text-blue-700 no-underline">CONSULTORÍA</a>
                </li>
                <li class="mr-3">
                    <a href="/" class="inline-block px-4 hover:text-blue-700 no-underline">ORDEN DE SERVICIO</a>
                </li>
                <li class="mr-3">
                    <a href="{{ route('pages.about_us') }}" class="inline-block px-4 hover:text-blue-700 no-underline">NOSOTROS</a>
                </li>
                <li class="mr-3">
                    <div class="flex items-center space-x-4 text-gray-900">
                        <h6 class="relative">|</h6>
                        <a href="#" class="relative hover:text-blue-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                        </a>
                        <a href="" class="relative hover:text-blue-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </a>
                        <a href="{{ route('login') }}" class="relative hover:text-blue-700">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        </a>

                        @if (Route::has('login'))
                            <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                @auth
                                    <h6>
                                        ¡Hola {{ auth()->user()->name }}!
                                    </h6>
                                    <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                                @else
                                    <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                                    @if (Route::has('register'))
                                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                @endauth
                            </div>
                        @endif

                    </div>
                </li>
            </ul>
        </div>
        <div>
            @auth
                <ul>
                    <li>
                        <h6>
                            ¡Hola {{ auth()->user()->name }}!
                        </h6>
                    </li>
                    <li>
                        <a href="{{ route('dashboard') }}" class="text-sm text-gray-700 underline">Dashboard</a>
                    </li>
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" value="Logout">
                        </form>
                    </li>
                </ul>
            @else
                <ul>
                    <li>
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>
                    </li>
                    <li>
                        <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                    </li>
                </ul>
            @endauth
        </div>
    </div>
</nav>
