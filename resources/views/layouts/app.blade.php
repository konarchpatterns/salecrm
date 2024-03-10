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

        <!-- Scripts -->
        <link href="{{asset('css/app.css')}}" rel="stylesheet" />
        <script src="{{asset('js/app.js')}}"></script>
        @stack('other-scripts')
        <!-- Styles -->
        @livewireStyles
    </head>
    <body class="font-sans antialiased">
        {{-- <x-banner /> --}}

        <div class="min-h-screen bg-gray-100">
            {{-- @livewire('navigation-menu')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main> --}}

            <nav class="fixed top-0 z-50 w-full bg-white border-b border-gray-200 dark:bg-gray-800 dark:border-gray-700">
                <div class="px-3 py-3 lg:px-5 lg:pl-3">
                  <div class="flex items-center justify-between">
                    <div class="flex items-center justify-start rtl:justify-end">
                      <button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
                          <span class="sr-only">Open sidebar</span>
                          <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                             <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
                          </svg>
                       </button>
                      <a href="https://flowbite.com" class="flex ms-2 md:me-24">
                        <img src="https://flowbite.com/docs/images/logo.svg" class="h-8 me-3" alt="FlowBite Logo" />
                        <span class="self-center text-xl font-semibold sm:text-2xl whitespace-nowrap dark:text-white">Flowbite</span>
                      </a>
                    </div>
                    <div class="flex items-center">
                        <div class="flex items-center ms-3">
                          <div>
                            @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
                            <button type="button" class="flex text-sm bg-gray-800 rounded-full focus:ring-4 focus:ring-gray-300 dark:focus:ring-gray-600" aria-expanded="false" data-dropdown-toggle="dropdown-user">
                              <span class="sr-only">Open user menu</span>
                              <img class="w-8 h-8 rounded-full" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                            </button>
                            @endif
                          </div>
                          <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded shadow dark:bg-gray-700 dark:divide-gray-600" id="dropdown-user">
                            <div class="px-4 py-3" role="none">
                              <p class="text-sm text-gray-900 dark:text-white" role="none">
                                {{  Auth::user()->name }}
                              </p>
                              <p class="text-sm font-medium text-gray-900 truncate dark:text-gray-300" role="none">
                                {{  Auth::user()->email }}
                              </p>
                            </div>
                            <ul class="py-1" role="none">
                              <li>
                                <a href="/dashboard" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Dashboard</a>
                              </li>
                              <li>
                                <a href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem">Profile</a>
                              </li>
                              <li>

                                    <form method="POST" action="{{ route('logout') }}" x-data>
                                        @csrf

                                        <x-dropdown-link class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-300 dark:hover:bg-gray-600 dark:hover:text-white" role="menuitem" href="{{ route('logout') }}"
                                                 @click.prevent="$root.submit();">
                                            {{ __('Log Out') }}
                                        </x-dropdown-link>
                                    </form>

                              </li>
                            </ul>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </nav>

              @livewire('navigation-menu')


              <div class="p-4 sm:ml-64">
                 <div class="p-4 mt-14">
                    {{-- <div class="grid grid-cols-3 gap-4 mb-4">
                       <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center h-24 rounded bg-gray-50 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                    </div>
                    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                       <p class="text-2xl text-gray-400 dark:text-gray-500">
                          <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                          </svg>
                       </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4 mb-4">
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                    </div>
                    <div class="flex items-center justify-center h-48 mb-4 rounded bg-gray-50 dark:bg-gray-800">
                       <p class="text-2xl text-gray-400 dark:text-gray-500">
                          <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                             <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                          </svg>
                       </p>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                       <div class="flex items-center justify-center rounded bg-gray-50 h-28 dark:bg-gray-800">
                          <p class="text-2xl text-gray-400 dark:text-gray-500">
                             <svg class="w-3.5 h-3.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                             </svg>
                          </p>
                       </div>
                    </div> --}}

                    {{ $slot }}

                 </div>
              </div>

        </div>

        @stack('modals')

        @livewireScripts
    </body>
</html>
