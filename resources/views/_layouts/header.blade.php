<header class="bg-[#301C11]">
    <div class="container mx-auto px-6 py-3">
        <div class="flex items-center justify-between">
            <div class="flex flex-row justify-start w-1/2 space-x-7">
                <div class="text-white text-2xl font-semibold">
                    UMKM HM Abadi
                </div>
                <nav :class="isOpen ? 'hidden' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-1">
                    <div class="flex flex-col sm:flex-row">
                        <a class="mt-3 {{ $state == 'Home' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('home.homeView') }}">Home</a>
                        <a class="mt-3 {{ $state == 'Catalogue' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline sm:mx-3 sm:mt-0" href="{{ route('catalogue.catalogueView') }}">Catalogue</a>
                        @if(session('user'))
                        <a class="mt-3 {{ $state == 'Pesanan' ? 'underline text-gray-200' : 'text-gray-400' }} text-gray-400 hover:underline sm:mx-3 sm:mt-0" href="#">Pesanan</a>
                        @endif
                    </div>
                </nav>
            </div>
            <div class="flex items-center justify-end w-1/2">
                <div class="flex flex-row space-x-6">
                    @if (session('user'))
                        <a class="bg-red-500 text-white px-1 rounded" onclick="return confirm('Apakah anda yakin ingin logout?')" href="{{ route('auth.signOut') }}">
                            Logout
                        </a>
                        <span class="text-gray-200 underline">
                            Halo, {{ session('user')->username }}
                        </span>
                    @else
                        <a class="{{ $state == 'Login' ? 'underline text-gray-200' : 'text-gray-400' }} hover:underline" href="{{ route('auth.loginView') }}">Login</a>
                    @endif

                    @if(session('user'))
                    <div class="flex flex-row" id="cart">
                        <button @click="cartOpen = !cartOpen"
                            class="text-gray-500 focus:outline-none mx-4 sm:mx-0 hover:underline">
                            <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                viewBox="0 0 24 24" stroke="currentColor">
                                <path
                                    d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                        </button>
                        <button @click="cartOpen = !cartOpen" class="rounded-full shadow bg-cyan-300 text-xs px-1 flex justify-center items-center border border-transparent">
                            {{ session('cart') ? count(session('cart')) : 0 }}
                        </button>
        
                        <div class="flex sm:hidden">
                            <button @click="isOpen = !isOpen" type="button"
                                class="text-gray-600 hover:text-gray-500 focus:outline-none focus:text-gray-500"
                                aria-label="toggle menu">
                                <svg viewBox="0 0 24 24" class="h-6 w-6 fill-current">
                                    <path fill-rule="evenodd"
                                        d="M4 5h16a1 1 0 0 1 0 2H4a1 1 0 1 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2zm0 6h16a1 1 0 0 1 0 2H4a1 1 0 0 1 0-2z">
                                    </path>
                                </svg>
                            </button>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        {{-- <nav :class="isOpen ? '' : 'hidden'" class="sm:flex sm:justify-center sm:items-center mt-4">
            <div class="flex flex-col sm:flex-row">
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Home</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Shop</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Categories</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">Contact</a>
                <a class="mt-3 text-gray-600 hover:underline sm:mx-3 sm:mt-0" href="#">About</a>
            </div>
        </nav> --}}
        {{-- <div class="relative mt-6 max-w-lg mx-auto">
            <span class="absolute inset-y-0 left-0 pl-3 flex items-center">
                <svg class="h-5 w-5 text-gray-500" viewBox="0 0 24 24" fill="none">
                    <path
                        d="M21 21L15 15M17 10C17 13.866 13.866 17 10 17C6.13401 17 3 13.866 3 10C3 6.13401 6.13401 3 10 3C13.866 3 17 6.13401 17 10Z"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
            </span>

            <input
                class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                type="text" placeholder="Search">
        </div> --}}
    </div>
</header>
