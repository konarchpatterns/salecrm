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
                        <input type="text" wire:model.debounce.300ms="search" id="table-search"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500
                            focus:border-primary-500 block w-1/3 pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                             dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search">
                    </div>
                    {{-- <button wire:click="export"
                        class="md:w-auto flex items-center justify-center py-2 px-4 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-primary-700 focus:z-10 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">
                        Export
                    </button> --}}
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
                            Name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Phone
                        </th>

                        <th scope="col" class="px-5 py-2">
                            Email
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Website
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Fax
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Country
                        </th>
                        <th scope="col" class="px-5 py-2">
                            State
                        </th>
                        <th scope="col" class="px-5 py-2">
                            City
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Time Zone
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Action
                        </th>
                        {{-- <th scope="col" class="px-5 py-2 text-right">
                            Actions
                        </th> --}}
                    </tr>
                </thead>
                <tbody>

                    @foreach ($account as $accounts)
                    @php
                        $companyphone=array_unique(explode(",",$accounts->clpp));
                        $clientphone=array_unique(explode(",",$accounts->clp));
                        $companymails=array_unique(explode(",",$accounts->companymail));
                        $couname=array_unique(explode(",",$accounts->couname));
                        $stname=array_unique(explode(",",$accounts->stname));
                        $timezone=array_unique(explode(",",$accounts->timezone));
                        $city=array_unique(explode(",",$accounts->cityname));
                    @endphp
                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 text-right">{{ $accounts->id }}</td>
                            <td class="px-4 py-3">{{ $accounts->name }}</td>
                            <td class="px-4 py-3">
                                @foreach ($companyphone as $val)
                                <a href="callto:{{ $val }}">{{$val}}</a><br>
                            @endforeach

                            @foreach ($clientphone as $val)
                            <a href="callto:{{ $val }}">{{$val}}</a><br>
                        @endforeach
                            </td>
                            <td class="px-4 py-3">
                                @foreach ($companymails as $val)
                                <a href="mailto:{{ $val }}">{{$val}}</a><br>
                            @endforeach
                            </td>
                            <td class="px-4 py-3"><a  href="{{$accounts->website}}" target="_blank">{{ $accounts->website }}</a></td>
                            <td class="px-4 py-3"> {{ $accounts->fax }}</td>
                            <td class="px-4 py-3">
                                @if(!empty($couname))
                                 {{ $couname[0] }}
                                 @endif
                                </td>
                            <td class="px-4 py-3">
                                @if(!empty($stname))
                                @if($stname[0]!="select states")
                                {{ $stname[0] }}
                                @endif
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(!empty($city))
                                @if($stname[0]!="select cities")
                                {{ $city[0] }}
                                @endif

                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(!empty($timezone))
                                {{ $timezone[0] }}
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                <a href="account/update/{{ $accounts->id }}">
                                <x-lucide-pencil style="color: #3253e6" width="20" height="20" />
                                </a>
                            </td>
                            {{-- <td class="px-4 py-3 text-right"> --}}

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
                                </x-modal>


                                <div x-data="{ open: {{ isset($open) && $open ? 'true' : 'false' }}, working: false }" x-cloak wire:key="delete-{{ $user->id }}">
                                    <div class="flex items-center gap-2 justify-end">

                                        <button wire:click="viewUser({{ $user->id }})">
                                            <x-lucide-pencil class="w-5 h-5 text-blue-500 hover:text-gray-500" />
                                        </button>

                                        <button x-on:click="open = true">
                                            <x-icons.trash class="w-5 h-5 text-red-500 hover:text-gray-500" />
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
                                                                <button wire:click="deleteDatas('{{ $user->id }}')"
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
                                </div> --}}

                            {{-- </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $account->links() }}
        </div>
    </section>
