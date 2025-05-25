 <div class="navbar fixed top-0 z-50 bg-white h-[89px] w-full shadow-md outline-[#00000061] outline-[1px]">
    <div class="w-full max-w-screen-xl mx-auto px-4 flex justify-between items-center h-full">
        <div class="flex-1">
            <a href="/" class="font-inter font-bold text-[30px] flex items-center gap-2 text-[#2563EB]">
                <img src="{{ asset('images/icon.png') }}" alt="Logo" class="w-8 h-8">
                SumAI
            </a>
        </div>

        <!-- Navigation Links (centered) -->
        <div class="hidden lg:flex flex-1 justify-center gap-8">
            <a href="/rangkuman" class="text-[20px] font-inter font-normal hover:underline">Rangkuman</a>
            <a href="/berita" class="text-[20px] font-inter font-normal hover:underline">Berita</a>
        </div>

        <!-- Authentication -->
        <div class="hidden lg:flex flex-1 justify-end items-center gap-4">
            @auth
                <!-- Dropdown Profil (dengan Alpine.js) -->
                <div x-data="{ open: false }" class="relative">
                    <button @click="open = !open" class="focus:outline-none">
                        <img src="{{ Auth::user()->profile_photo_url ?? asset('images/profil.png') }}"
                            alt="Profile"
                            class="w-10 h-10 rounded-full object-cover cursor-pointer">
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false"
                        x-transition
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg z-50">
                        <ul class="py-2 text-gray-700">
                            <!-- Username -->
                            <li class="px-4 py-2 font-semibold text-sm text-gray-600">
                                {{ Auth::user()->name }}
                            </li>
                            <li>
                                <a href="{{ route('riwayat.index') }}"
                                   class="block px-4 py-2 hover:bg-gray-100">Riwayat</a>
                            </li>
                            <li class="border-t my-2"></li>
                            <li>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                            class="block w-full text-left px-4 py-2 hover:bg-gray-100 text-red-600">
                                        Logout
                                    </button>
                                </form>
                            </li>
                        </ul>
                    </div>
                </div>
            @else
                <!-- Tombol Masuk dan Daftar -->
                <a href="{{ route('login') }}"
                   class="border border-blue-600 text-blue-600 font-semibold text-sm px-4 py-2 rounded-md hover:bg-blue-50 transition-all">
                    Masuk
                </a>
                <a href="{{ route('register') }}"
                   class="bg-blue-600 text-white font-semibold text-sm px-4 py-2 rounded-md hover:bg-blue-700 transition-all">
                    Daftar
                </a>
            @endauth
        </div>

        <!-- Mobile Hamburger -->
        <div class="lg:hidden">
            <details class="dropdown dropdown-end">
                <summary class="m-1 btn btn-ghost btn-circle">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                </summary>
                <ul class="menu menu-sm dropdown-content mt-3 z-[1] p-2 shadow bg-base-100 rounded-box w-52">
                    <li><a href="/rangkuman">Rangkuman</a></li>
                    <li><a href="/berita">Berita</a></li>
                    <li><a href="{{ route('riwayat.index') }}">Riwayat</a></li>

                    <li class="border-t mt-2 pt-2">
                        @auth
                            <div class="flex flex-col gap-1 px-2">
                                <div class="flex items-center gap-2">
                                    <img src="{{ Auth::user()->profile_photo_url ?? asset('images/profil.png') }}"
                                        alt="Profile"
                                        class="w-8 h-8 rounded-full object-cover">
                                    <span class="text-sm font-semibold text-gray-700">{{ Auth::user()->name }}</span>
                                </div>
                                <form action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-600 text-sm text-left">Logout</button>
                                </form>
                            </div>
                        @else
                            <a href="{{ route('login') }}">Masuk</a>
                            <a href="{{ route('register') }}">Daftar</a>
                        @endauth
                    </li>
                </ul>
            </details>
        </div>
    </div>
</div>

