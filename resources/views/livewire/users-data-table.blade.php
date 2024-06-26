<div>
    <style>
        .loader {
            display: flex;
            justify-content: center;
            align-items: center;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(255, 255, 255, 0.7);
            /* Semi-transparent background */
            z-index: 9999;
            /* Ensure it's on top of other content */
        }
    </style>




    <section class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">
        <div class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
            <div class="w-full md:w-1/2">
                <form class="flex items-center">
                    <label for="simple-search" class="sr-only">Search</label>
                    <div class="relative w-full">
                        <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                            <x-lucide-search class="w-5 h-5 text-gray-500 dark:text-gray-400" />
                        </div>
                        <input type="text" wire:model.live.debounce.300ms="search" id="table-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500 focus:border-primary-500 block w-1/3 pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search">
                    </div>


                    <svg class="h-10 mr-10" wire:click="export" id="Capa_1"
                        style="enable-background:new 0 0 128 128; margin-right: 40px" version="1.1"
                        viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg"
                        xmlns:xlink="http://www.w3.org/1999/xlink">
                        <style type="text/css">
                            .st0 {
                                fill: #21A365;
                            }

                            .st1 {
                                fill: #107C41;
                            }

                            .st2 {
                                fill: #185B37;
                            }

                            .st3 {
                                fill: #33C481;
                            }

                            .st4 {
                                fill: #17864C;
                            }

                            .st5 {
                                fill: #FFFFFF;
                            }

                            .st6 {
                                fill: #036C70;
                            }

                            .st7 {
                                fill: #1A9BA1;
                            }

                            .st8 {
                                fill: #37C6D0;
                            }

                            .st9 {
                                fill: #04878B;
                            }

                            .st10 {
                                fill: #4F59CA;
                            }

                            .st11 {
                                fill: #7B82EA;
                            }

                            .st12 {
                                fill: #4C53BB;
                            }

                            .st13 {
                                fill: #0F78D5;
                            }

                            .st14 {
                                fill: #29A7EB;
                            }

                            .st15 {
                                fill: #0358A8;
                            }

                            .st16 {
                                fill: #0F79D6;
                            }

                            .st17 {
                                fill: #038387;
                            }

                            .st18 {
                                fill: #048A8E;
                            }

                            .st19 {
                                fill: #C8421D;
                            }

                            .st20 {
                                fill: #FF8F6A;
                            }

                            .st21 {
                                fill: #ED6B47;
                            }

                            .st22 {
                                fill: #891323;
                            }

                            .st23 {
                                fill: #AF2131;
                            }

                            .st24 {
                                fill: #C94E60;
                            }

                            .st25 {
                                fill: #E08195;
                            }

                            .st26 {
                                fill: #B42839;
                            }

                            .st27 {
                                fill: #0464B8;
                            }

                            .st28 {
                                fill: #0377D4;
                            }

                            .st29 {
                                fill: #4FD8FF;
                            }

                            .st30 {
                                fill: #1681D7;
                            }

                            .st31 {
                                fill: #0178D4;
                            }

                            .st32 {
                                fill: #042071;
                            }

                            .st33 {
                                fill: #168FDE;
                            }

                            .st34 {
                                fill: #CA64EA;
                            }

                            .st35 {
                                fill: #7E1FAF;
                            }

                            .st36 {
                                fill: #AE4BD5;
                            }

                            .st37 {
                                fill: #9332BF;
                            }

                            .st38 {
                                fill: #7719AA;
                            }

                            .st39 {
                                fill: #0078D4;
                            }

                            .st40 {
                                fill: #1490DF;
                            }

                            .st41 {
                                fill: #0364B8;
                            }

                            .st42 {
                                fill: #28A8EA;
                            }

                            .st43 {
                                fill: #41A5ED;
                            }

                            .st44 {
                                fill: #2C7BD5;
                            }

                            .st45 {
                                fill: #195ABE;
                            }

                            .st46 {
                                fill: #103E91;
                            }

                            .st47 {
                                fill: #2166C3;
                            }

                            .st48 {
                                opacity: 0.2;
                            }
                        </style>
                        <rect class="st0" height="29.8" width="49.3" x="78.7" y="34.2" />
                        <rect class="st1" height="29.8" width="49.3" x="78.7" y="64" />
                        <rect class="st1" height="29.8" width="49.2" x="29.5" y="34.2" />
                        <path class="st2"
                            d="M78.7,93.8V64H29.6v29.8v4.3v19.6c0,3.2,2.6,5.8,5.8,5.8h86.7c3.2,0,5.8-2.6,5.8-5.8V93.8H78.7z" />
                        <path class="st3" d="M122.1,4.5H78.6v29.8h49.4V10.3C127.9,7.1,125.3,4.5,122.1,4.5z" />
                        <path class="st0" d="M78.7,4.5H35.5c-3.2,0-5.8,2.6-5.8,5.8v23.9h49.1V4.5z" />
                        <path class="st4"
                            d="M59.5,96.5h-53c-3.5,0-6.4-2.9-6.4-6.4V37.9c0-3.5,2.9-6.4,6.4-6.4h53c3.5,0,6.4,2.9,6.4,6.4v52.2  C65.9,93.6,63.1,96.5,59.5,96.5z" />
                        <g>
                            <path class="st5"
                                d="M40.5,82.4l-3.9-7.1c-1.6-2.8-2.6-4.7-3.7-6.8h-0.1c-0.9,2.1-1.8,4-3.3,6.8L26,82.4h-7.6l10.8-18.1L18.7,46.5   h7.7l3.9,7.4c1.2,2.2,2.1,4,3,6h0.2c1-2.2,1.7-3.8,2.9-6l3.9-7.4h7.6L37.2,64l11.1,18.4H40.5z" />
                        </g>
                        <path class="st48"
                            d="M66.7,37.3c0,0.2,0,0.4,0,0.6v52.2c0,3.5-2.9,6.4-6.4,6.4H30.4v5.7h35.2c3.5,0,6.4-2.9,6.4-6.4V43.6  C72.1,40.4,69.7,37.7,66.7,37.3z" />
                    </svg>
                </form>
            </div>

        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-sm text-left text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-5 py-2 text-right">
                            ID
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Employee Name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Email
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Last seen
                        </th>
                        <th scope="col" class="px-5 py-2">
                            status
                        </th>
                        {{-- <th scope="col" class="px-5 py-2">
                            Manager
                        </th> --}}
                        <th scope="col" class="px-5 py-2 text-right">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($users as $user)
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 text-right">{{ $user->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://avatar.iran.liara.run/public/boy?username={{ $user->EmployeeName }}"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900">
                                            {{ $user->EmployeeName }}
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $user->dname }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3"> {{ $user->email }}</td>
                            <td class="px-4 py-3"> 
                                {{ Carbon\Carbon::parse($user->last_seen)->diffForHumans() }}
                            </td>
                            <td class="px-4 py-3"> 
                                @if(Cache::has('user-is-online-' . $user->id))
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Online
                                </div>
                                @else
                                <div class="flex items-center">
                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> offline
                                </div>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-right">

                                {{-- <x-modal :value="$user->id">
                                    <x-slot name="trigger">
                                        <button class="p-1 text-blue-600 hover:bg-blue-600 hover:text-white rounded">
                                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                                </path>
                                            </svg>
                                        </button>
                                    </x-slot>
                                    <h1 class="text-2xl text-purple-700">{{ $user->EmployeeName }}</h1>
                                </x-modal> --}}


                                <div x-data="{ open: {{ isset($open) && $open ? 'true' : 'false' }}, working: false }" x-cloak wire:key="delete-{{ $user->id }}">
                                    <div class="flex items-center gap-2 justify-end">
                                        <button wire:click="viewUser({{ $user->id }})">
                                            <x-lucide-pencil class="w-5 h-5 text-blue-500 hover:text-gray-500" />
                                        </button>

                                        <button x-on:click="open = true">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-red-600"
                                                viewBox="0 0 24 24">
                                                <path fill="currentColor"
                                                    d="M5 21V6H4V4h5V3h6v1h5v2h-1v15zm2-2h10V6H7zm2-2h2V8H9zm4 0h2V8h-2zM7 6v13z" />
                                            </svg>
                                            {{-- <x-icons.trash class="w-5 h-5 text-red-500 hover:text-gray-500" /> --}}
                                        </button>
                                    </div>

                                    <div x-show="open"
                                        class="fixed z-50 bottom-0 inset-x-0 px-4 pb-4 sm:inset-0 sm:flex sm:items-center sm:justify-center">
                                        <div x-show="open" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100" x-transition:leave-end="opacity-0"
                                            class="fixed inset-0 transition-opacity">
                                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                                        </div>

                                        <div x-show="open" x-transition:enter="ease-out duration-300"
                                            x-transition:enter-start="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            x-transition:enter-end="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave="ease-in duration-200"
                                            x-transition:leave-start="opacity-100 translate-y-0 sm:scale-100"
                                            x-transition:leave-end="opacity-0 translate-y-4 sm:translate-y-0 sm:scale-95"
                                            class="relative bg-gray-100 rounded-lg px-4 pt-5 pb-4 overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full sm:p-6">
                                            <div class="hidden sm:block absolute top-0 right-0 pt-4 pr-4">
                                                <button @click="open = false" type="button"
                                                    class="text-gray-400 hover:text-gray-500 focus:outline-none focus:text-gray-500 transition ease-in-out duration-150">
                                                    <svg class="h-6 w-6" stroke="currentColor" fill="none"
                                                        viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                                                    </svg>
                                                </button>
                                            </div>
                                            <div class="w-full">
                                                <div class="mt-3 text-center">
                                                    <h3 class="text-lg leading-6 font-medium text-gray-900">
                                                        {{ __('Delete') }} {{ $user->EmployeeName }}
                                                    </h3>
                                                    <div class="mt-2">
                                                        <div class="mt-10 text-gray-700">
                                                            {{ __('Are you sure?') }}
                                                        </div>
                                                        <div class="mt-10 flex justify-center">
                                                            <span class="mr-2">
                                                                <button x-on:click="open = false"
                                                                    x-bind:disabled="working"
                                                                    class="w-32 shadow-sm inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-gray-600 hover:bg-gray-700 focus:outline-none focus:border-gray-700 focus:shadow-outline-teal active:bg-gray-700 transition ease-in-out duration-150">
                                                                    {{ __('No') }}
                                                                </button>
                                                            </span>
                                                            <span x-on:click="working = !working">
                                                                <button
                                                                    wire:click="deleteDatas('{{ $user->id }}')"
                                                                    class="w-32 shadow-sm inline-flex justify-center items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:border-red-700 focus:shadow-outline-teal active:bg-red-700 transition ease-in-out duration-150">
                                                                    {{ __('Yes') }}
                                                                </button>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $users->links() }}
        </div>
    </section>
</div>
