<div id="main-navbar"
    class="drawer sticky top-0 z-50 w-full bg-transparent px-2 transition duration-300 ease-in-out lg:px-12">
    <input id="my-drawer-3" type="checkbox" class="drawer-toggle" />
    <div class="drawer-content flex flex-col">

        <div class="navbar bg-var[#F5F5DC] px-2">

            <div class="navbar-start space-x-3">
                <img src="{{ asset('images/logo.png') }}" alt="" class="h-10">
                <a href="#" class="text-xl font-bold">Thariqa</a>
            </div>

            {{-- /* --------------------------- NAVBAR FOR DEKSTOP --------------------------- */ --}}
            <div class="navbar-center hidden md:flex">
                <ul tabindex="0" class="menu menu-horizontal dropdown-content px-1 text-lg font-bold">

                    @if (Auth::check())
                        <li class="group relative">
                            <a>Home</a>
                            <ul
                                class="bg-base-100 absolute left-1/2 top-full z-20 hidden w-48 -translate-x-1/2 rounded-md p-2 shadow-md group-hover:block">
                                <li><a href="{{ route('filament.admin.pages.dashboard') }}">Dashboard</a></li>
                                <li><a href="{{ route('home') }}">Beranda</a></li>
                            </ul>
                        </li>
                        <li class="group relative">
                            <a>Tentang Kami</a>
                            <ul
                                class="bg-base-100 absolute left-1/2 top-full z-20 hidden w-48 -translate-x-1/2 rounded-md p-2 shadow-md group-hover:block">
                                <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                                <li><a href="{{ route('filament.admin.resources.members.index') }}">Daftar Pengguna</a>
                                </li>
                            </ul>
                        </li>
                        <li class="group relative">
                            <a>Materi</a>
                            <ul
                                class="bg-base-100 absolute left-1/2 top-full z-20 hidden w-48 -translate-x-1/2 rounded-md p-2 shadow-md group-hover:block">
                                <li><a href="{{ route('filament.admin.resources.materis.index') }}">Kelola Materi</a>
                                </li>
                                <li><a href="{{ route('materi') }}">Daftar Materi</a></li>
                            </ul>
                        </li>
                    @else
                        <li><a href="{{ route('home') }}"> Beranda </a></li>
                        <li><a href="{{ route('about') }}">Tentang Kami</a></li>
                        <li><a href="{{ route('materi') }}">Materi</a></li>
                    @endif
                </ul>
            </div>
            <div class="navbar-end flex space-x-5">


                {{-- @if (Auth::check()) --}}
                {{-- /* --------------------------------- PROFILE BTN -------------------------------- */ --}}
                <div class="dropdown dropdown-end">
                    <label tabindex="0" class="btn btn-ghost btn-circle avatar size-8">
                        {{-- <div class="w-6 rounded-full"> --}}
                        @if (Auth::check() && Auth::user()->avatar)
                            <img src="{{ asset('storage/' . Auth::user()->avatar) }}" class="rounded-full" />
                        @else
                            {{-- <img src="{{ asset('images/profile.png') }}" class="rounded-full" /> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                class="bi bi-person-circle size-8" viewBox="0 0 16 16">
                                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                <path fill-rule="evenodd"
                                    d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                            </svg>
                        @endif
                        {{-- </div> --}}
                    </label>

                    {{-- /* ---------------------------- PROFILE DROPDOWN ---------------------------- */ --}}
                    <ul tabindex="0"
                        class="menu menu-sm dropdown-content bg-base-100 rounded-box z-[1] mt-3 w-52 p-2 shadow">
                        {{-- <li> --}}
                        <div class="flex items-center space-x-2">
                            <div>
                                <div class="flex items-center space-x-4">
                                    <div class="avatar">
                                        <div class="rounded-fullwhite w-10">
                                            @if (Auth::check() && Auth::user()->avatar)
                                                <img src="{{ asset('storage/' . Auth::user()->avatar) }}" />
                                            @else
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                                    class="bi bi-person-circle size-8" viewBox="0 0 16 16">
                                                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                                    <path fill-rule="evenodd"
                                                        d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                                </svg>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-32 flex-col space-y-1">
                                @if (Auth::check())
                                    <span
                                        class="max-w-xs overflow-hidden truncate text-ellipsis whitespace-nowrap text-base font-bold capitalize">
                                        {{ Auth::user()->full_name }}
                                    </span>

                                    <span class="max-w-xs overflow-hidden truncate text-ellipsis whitespace-nowrap">
                                        {{ Auth::user()->email }}
                                    </span>
                                @else
                                    <span
                                        class="max-w-xs overflow-hidden truncate text-ellipsis whitespace-nowrap text-base font-bold capitalize">
                                        Hamba Allah
                                    </span>
                                @endif
                            </div>
                        </div>
                        {{-- </li> --}}

                        <div class="divider my-1"></div>


                        @if (Auth::check())
                            <li class="mb-1 md:hidden">
                                <a class="text-sm" href="{{ route('filament.admin.pages.dashboard') }}">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-speedometer" viewBox="0 0 16 16">
                                            <path
                                                d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2M3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707M2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8m9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5m.754-4.246a.39.39 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.39.39 0 0 0-.029-.518z" />
                                            <path fill-rule="evenodd"
                                                d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.95 11.95 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0" />
                                        </svg>
                                    </div>
                                    Dashboard
                                </a>
                            </li>
                            <li class="mb-1 md:hidden">
                                <a class="text-sm" href="{{ route('filament.admin.resources.members.index') }}">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
                                            <path
                                                d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6m-5.784 6A2.24 2.24 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.3 6.3 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1zM4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5" />
                                        </svg>
                                    </div>
                                    Daftar Pengguna
                                </a>
                            </li>
                            <li class="mb-1 md:hidden">
                                <a class="text-sm" href="{{ route('filament.admin.resources.materis.index') }}">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-book-half" viewBox="0 0 16 16">
                                            <path
                                                d="M8.5 2.687c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783" />
                                        </svg>
                                    </div>
                                    Kelola Materi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" class="text-sm text-red-500">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                        </svg>
                                    </div>
                                    Logout
                                </a>
                            </li>
                        @else
                            <li>
                                <button class="text-sm text-green-500" onclick="loginModal.showModal()">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                                            <path fill-rule="evenodd"
                                                d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0z" />
                                            <path fill-rule="evenodd"
                                                d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708z" />
                                        </svg>
                                    </div>
                                    Login
                                </button>
                            </li>
                        @endif
                    </ul>
                </div>

                {{-- /* ---------------------------------- THEME --------------------------------- */ --}}
                <label class="swap swap-rotate">
                    <!-- this hidden checkbox controls the state -->
                    <input type="checkbox" class="theme-controller" value="dark" />

                    <!-- sun icon -->
                    <svg class="swap-off size-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M5.64,17l-.71.71a1,1,0,0,0,0,1.41,1,1,0,0,0,1.41,0l.71-.71A1,1,0,0,0,5.64,17ZM5,12a1,1,0,0,0-1-1H3a1,1,0,0,0,0,2H4A1,1,0,0,0,5,12Zm7-7a1,1,0,0,0,1-1V3a1,1,0,0,0-2,0V4A1,1,0,0,0,12,5ZM5.64,7.05a1,1,0,0,0,.7.29,1,1,0,0,0,.71-.29,1,1,0,0,0,0-1.41l-.71-.71A1,1,0,0,0,4.93,6.34Zm12,.29a1,1,0,0,0,.7-.29l.71-.71a1,1,0,1,0-1.41-1.41L17,5.64a1,1,0,0,0,0,1.41A1,1,0,0,0,17.66,7.34ZM21,11H20a1,1,0,0,0,0,2h1a1,1,0,0,0,0-2Zm-9,8a1,1,0,0,0-1,1v1a1,1,0,0,0,2,0V20A1,1,0,0,0,12,19ZM18.36,17A1,1,0,0,0,17,18.36l.71.71a1,1,0,0,0,1.41,0,1,1,0,0,0,0-1.41ZM12,6.5A5.5,5.5,0,1,0,17.5,12,5.51,5.51,0,0,0,12,6.5Zm0,9A3.5,3.5,0,1,1,15.5,12,3.5,3.5,0,0,1,12,15.5Z" />
                    </svg>

                    <!-- moon icon -->
                    <svg class="swap-on size-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                        <path
                            d="M21.64,13a1,1,0,0,0-1.05-.14,8.05,8.05,0,0,1-3.37.73A8.15,8.15,0,0,1,9.08,5.49a8.59,8.59,0,0,1,.25-2A1,1,0,0,0,8,2.36,10.14,10.14,0,1,0,22,14.05,1,1,0,0,0,21.64,13Zm-9.5,6.69A8.14,8.14,0,0,1,7.08,5.22v.27A10.15,10.15,0,0,0,17.22,15.63a9.79,9.79,0,0,0,2.1-.22A8.11,8.11,0,0,1,12.14,19.73Z" />
                    </svg>
                </label>
            </div>
        </div>
    </div>

    <dialog id="loginModal" class="modal">
        @include('includes.login')
    </dialog>

    {{-- /* ----------------------------- DRAWER CONTENT ----------------------------- */ --}}
    {{-- <div class="drawer-side z-30">
        <label for="my-drawer-3" aria-label="close sidebar" class="drawer-overlay"></label>
        <ul class="menu bg-white min-h-full w-80 p-4">
            <li>
                <h1 class="text-2xl font-bold">Yans Homemade</h1>
            </li>
 --}}
    {{-- @if (Auth::check() && Auth::user()->role == 'admin') --}}
    {{-- /* -------------------------------- FOR ADMIN ------------------------------- */ --}}
    {{-- <li class="mt-4">
                    <a href="{{ route('filament.admin.pages.dashboard') }}" class="p-3 text-lg font-bold uppercase"
                        style="font-family:'Playfair display', sans-serif"> Dashboard </a>
                </li>

                <li class="mt-4">
                    <a href="{{ route('filament.admin.resources.categories.index') }}"
                        class="p-3 text-lg font-bold uppercase" style="font-family:'Playfair display', sans-serif">
                        Kelola Kategori </a>
                </li>

                <li class="mt-4">
                    <a href="{{ route('filament.admin.resources.products.index') }}"
                        class="p-3 text-lg font-bold uppercase" style="font-family:'Playfair display', sans-serif">
                        Kelola Produk </a>
                </li> --}}

    {{-- <li class="mt-4">
                    <a href="{{ route('filament.admin.resources.orders.index') }}"
                        class="p-3 text-lg font-bold uppercase" style="font-family:'Playfair display', sans-serif">
                        Kelola Pesanan </a>
                </li>
            @else --}}
    {{-- /* -------------------------- FOR USER -------------------------- */ --}}
    {{-- <li class="mt-4">
                    <a href="{{ route('landing') }}" class="p-3 text-lg font-bold uppercase"
                        style="font-family:'Playfair display', sans-serif"> Beranda </a>
                </li>

                <li>
                    <a href="{{ route('menu') }}" class="p-3 text-lg font-bold uppercase"
                        style="font-family:'Playfair display', sans-serif">Menu</a>
                </li>

                <li>
                    <a href="{{ route('landing', '#about') }}" class="p-3 text-lg font-bold uppercase"
                        style="font-family:'Playfair display', sans-serif">Tentang Kami</a>
                </li>

                @if (Auth::check() && Auth::user()->role == 'customer')
                    <li>
                        <a href="{{route('order')}}" class="p-3 text-lg font-bold uppercase"
                            style="font-family:'Playfair display', sans-serif">Pesanan</a> --}}
    {{-- @else --}}
    {{-- </li>
                @endif

                <li>
                    <a href="{{ route('contact') }}" class="p-3 text-lg font-bold uppercase"
                        style="font-family:'Playfair display', sans-serif">Kontak</a>
                </li>
            @endif
        </ul>
    </div> --}}
</div>

<script>
    window.addEventListener('scroll', function() {
        const navbar = document.getElementById('main-navbar');
        if (window.scrollY > 50) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('bg-base-100', 'shadow-md', 'backdrop-blur');
        } else {
            navbar.classList.remove('bg-white', 'shadow-md', 'backdrop-blur');
            navbar.classList.add('bg-transparent');
        }
    });
</script>
