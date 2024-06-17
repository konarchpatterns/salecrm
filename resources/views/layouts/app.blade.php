<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.css" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @stack('other-scripts')
    <!-- Styles -->
    @livewireStyles
</head>

<body class="font-sans antialiased">

    <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="px-3 py-3 lg:px-5 lg:pl-3">
            <div class="flex items-center justify-between">
                <div class="flex items-center justify-start rtl:justify-end">
                    <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar"
                        aria-controls="logo-sidebar" type="button"
                        class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                        <span class="sr-only">Open sidebar</span>
                        <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path clip-rule="evenodd" fill-rule="evenodd"
                                d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z">
                            </path>
                        </svg>
                    </button>
                    <a href="{{ route('dashboard') }}" class="flex ms-2 md:me-24 gap-2">
                        <svg class="sm:h-12 sm:w-12 h-10 w-10" viewBox="0 0 500 266">
                            <path class="fill-current"
                                d="M468.45 239.044 272.255 24.797c-1.587-1.786-3.769-2.777-5.952-2.777-.991 0-2.182.198-3.174.793-3.174 1.389-5.157 4.761-5.157 8.53V245.59c0 2.381.793 4.762 2.578 6.547 1.588 1.785 3.77 2.777 5.952 2.777h196.195c3.372 0 6.546-2.182 7.736-5.753.397-1.19.596-2.38.596-3.571 0-2.38-.992-4.761-2.579-6.546Zm-9.324 4.959H267.494V34.914l191.632 209.089Z">
                            </path>
                            <path class="fill-orange-600"
                                d="M255.79 74.788h70.027c.793 0 1.587-.595 1.785-1.388.397-.794.199-1.785-.397-2.38l-4.959-5.357c-.397-.397-.793-.595-1.389-.595H255.79c-.595 0-.992.198-1.389.595-.397.397-.595.992-.595 1.587v5.356c0 .596.198 1.19.595 1.587.397.397.794.596 1.389.596Zm0-62.687h12.498c.793 0 1.587-.595 1.785-1.388.397-.794.198-1.786-.397-2.38l-4.959-5.357c-.397-.397-.794-.595-1.389-.595h-7.538c-.595 0-.992.198-1.389.595-.397.397-.595.992-.595 1.587v5.356c0 .595.198 1.19.595 1.587.397.397.794.595 1.389.595Zm0 125.375h127.358c.793 0 1.587-.595 1.785-1.389.397-.793.199-1.785-.397-2.381l-4.959-5.356c-.397-.396-.793-.595-1.389-.595H255.79c-.595 0-.992.199-1.389.595-.397.397-.595.992-.595 1.587v5.356c0 .596.198 1.191.595 1.588.397.396.794.595 1.389.595Zm243.607 121.803-4.96-5.356c-.396-.397-.793-.595-1.388-.595H255.79c-.595 0-.992.198-1.389.595-.397.397-.595.992-.595 1.587v5.356c0 .595.198 1.19.595 1.587.397.397.794.595 1.389.595h242.218c.794 0 1.587-.595 1.785-1.388.397-.794.199-1.786-.396-2.381ZM255.79 200.163h184.887c.794 0 1.587-.595 1.786-1.389.396-.793.198-1.785-.397-2.38l-4.96-5.357c-.396-.396-.793-.595-1.388-.595H255.79c-.595 0-.992.199-1.389.595-.397.397-.595.992-.595 1.587v5.357c0 .595.198 1.19.595 1.587.397.396.794.595 1.389.595Z">
                            </path>
                            <path class="fill-primary"
                                d="M253.41 188.26H69.316l-.794.397-10.91 11.902c-.199.397-.397.794-.199 1.19.199.397.595.596.992.596H253.41l.595-.397.198-.794v-11.902l-.198-.794-.595-.198Zm0 62.687H11.985l-.794.397-10.91 11.902c-.199.397-.397.794-.199 1.191.199.396.595.595.992.595H253.41l.595-.397.198-.794v-11.902l-.198-.794-.595-.198Zm0-188.061h-69.234l-.793.396-10.911 11.903c-.199.397-.397.793-.199 1.19.199.397.596.595.992.595h80.145l.595-.397.198-.793V63.877l-.198-.793-.595-.199Zm0 62.687H126.845l-.793.396-10.911 11.903c-.199.397-.397.794-.199 1.19.199.397.596.595.992.595H253.41l.595-.396.198-.794v-11.902l-.198-.794-.595-.198ZM254.203.397 253.608 0h-11.704l-.794.397-10.91 11.902c-.199.397-.397.794-.199 1.19.198.397.595.596.992.596h22.813l.596-.397.198-.793V.992l-.397-.595Z">
                            </path>
                        </svg>
                        <span
                            class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Patterns</span>
                    </a>
                </div>
                {{-- <div class="flex items-center">
                    <div class="flex items-center ms-3">
                        <div>
                            <button type="button"
                                class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600"
                                aria-expanded="false" data-dropdown-toggle="dropdown-user">
                                <span class="sr-only">Open user menu</span>
                                <img class="w-8 h-8 rounded-full"
                                    src="https://flowbite.com/docs/images/people/profile-picture-5.jpg"
                                    alt="user photo">
                            </button>
                        </div>
                        <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600"
                            id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                                <p class="text-sm text-gray-900 dark:text-white" role="none">
                                    Neil Sims
                                </p>
                                <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                    neil.sims@flowbite.com
                                </p>
                            </div>
                            <ul class="py-1" role="none">
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Dashboard</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Settings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Earnings</a>
                                </li>
                                <li>
                                    <a href="#"
                                        class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white"
                                        role="menuitem">Sign out</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div> --}}

                <!-- Settings Dropdown -->
                <div class="ms-3 relative shrink-0">
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                                <button
                                    class="flex text-sm border-2 border-transparent rounded-full focus:outline-none focus:border-gray-300 transition">
                                    <img class="h-8 w-8 rounded-full object-cover"
                                        src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                                </button>
                            @else
                                <span class="inline-flex rounded-md">
                                    <button type="button"
                                        class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none focus:bg-gray-50 active:bg-gray-50 transition ease-in-out duration-150">
                                        {{ Auth::user()->name }}

                                        <svg class="ms-2 -me-0.5 h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                            fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M19.5 8.25l-7.5 7.5-7.5-7.5" />
                                        </svg>
                                    </button>
                                </span>
                            @endif
                        </x-slot>

                        <x-slot name="content">
                            <!-- Account Management -->
                            <div class="block px-4 py-2 border-b text-xs text-gray-400">
                                {{ __('Manage Account') }}
                            </div>

                            <x-dropdown-link href="{{ route('profile.show') }}">
                                {{ __('Profile') }}
                            </x-dropdown-link>

                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}" x-data>
                                @csrf

                                <x-dropdown-link href="{{ route('logout') }}" @click.prevent="$root.submit();"
                                    class="text-red-700 bg-red-100 hover:bg-red-700 hover:text-red-100">
                                    {{ __('Log Out') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                </div>

            </div>
        </div>
    </nav>

    @livewire('navigation-menu')

    <div class="p-4 sm:ml-64 mt-2">
        {{ $slot }}
    </div>

    @stack('modals')

    @livewireScripts
    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <!-- lucide icons start -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
    <!-- lucide icons end -->
</body>

</html>
