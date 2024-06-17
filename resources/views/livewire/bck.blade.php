<div>
    <div wire:loading>
        <img src="{{ asset('images/loader.gif') }}" style="height:85px;width:auto;" alt="Loading..." class="loader">
    </div>
    <style>
.loader {
    position: absolute;
    left: 50%;
    top: 60%;
    transform: translate(-50%, -50%);
    z-index: 1000;
}
        /* .loader {
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
            /*
            z-index: 9999;
            /* Ensure it's on top of other content */
            /*
        } */

        th,
        td {
            text-wrap: nowrap;
        }
    </style>

    <style>
        .inline-container {
            display: inline-block;
            vertical-align: middle;
            /* Optional: Aligns the image and text vertically */
        }

        .inline-container img {
            vertical-align: middle;
            /* Optional: Aligns the image and text vertically */
        }
    </style>

    <section class="bg-white dark:bg-gray-800 relative shadow-md sm:rounded-lg overflow-hidden">

        <div
            class="flex items-center justify-between flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
            <div>
                <button id="dropdownActionButton" data-dropdown-toggle="dropdownAction"
                    class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-3 py-1.5 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700"
                    type="button">
                    <span class="sr-only">Action</span>
                    Assign User
                    <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 10 6">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 4 4 4-4" />
                    </svg>
                </button>
                <!-- Dropdown menu -->
                <div id="dropdownAction"
                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600 h-52 overflow-y-auto">
                    <ul class="py-1 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownActionButton">
                        @foreach ($users as $user)
                            <li>
                                <a href="#" wire:click="assignOpenModal('{{ $user->id }}')"
                                    class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">{{ $user->name }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <div class="flex items-center gap-5">
                <label>
                    <select wire:model.live="unassign" class="border rounded-md px-2 shadow w-44 text-sm  text-gray-700 dark:text-gray-200" >
                        <option value="all">All</option>
                        <option value="na">New Account</option>
                        <option value="da">Dialed Account</option>
                        <option value="aa">Assign Account</option>
                        <option value="ua">Unassign Account</option>
                    </select>
                </label>
                @json($time_period);
                @if ($unassign != "all")
                <label>
                    <select wire:model.live="time_period" class="border rounded-md px-2 shadow w-44 text-sm  text-gray-700 dark:text-gray-200" >
                        <option value="all">All time</option>
                        <option value="3">Last 3 month</option>
                        <option value="6">Last 6 month</option>
                        <option value="12">Last 12 month</option>
                    </select>
                </label>
                @endif
                <div class="relative">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex   items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19  19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" wire:model.live.debounce.300ms="search" id="table-search"
                        class="block p-2 ps-10 text-sm text-gray-900    border border-gray-300 rounded-lg w-80 bg-gray-50  focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700   dark:border-gray-600 dark:placeholder-gray-400 dark:text-white    dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for users">
                </div>
            </div>
        </div>

        <div class=" overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4 sticky left-0 bg-gray-50">
                            <div class="flex items-center">
                                <input wire:model="selectPage" wire:click="updateSelectPage" id="checkbox-all-search"
                                    type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600
                                     dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('id')">
                                ID
                                 @if(isset($sorts['id']))
                                     @if($sorts['id'] == 'asc')
                                         &uarr;
                                     @else
                                         &darr;
                                     @endif
                                     @else
                                     &uarr; &darr;
                                     @endif
                             </button>
                        </th>
                        <th scope="col" class="px-6 py-3">

                            <button wire:click="sortBy('name')">
                                Name
                                @if(isset($sorts['name']))
                                    @if($sorts['name'] == 'asc')
                                        &uarr;
                                    @else
                                        &darr;
                                    @endif
                                    @else
                                    &uarr; &darr;
                                    @endif
                            </button>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('users.name')">
                               ASSIGN TO
                                @if(isset($sorts['users.name']))
                                    @if($sorts['users.name'] == 'asc')
                                        &uarr;
                                    @else
                                        &darr;
                                    @endif
                                    @else
                                    &uarr; &darr;
                                    @endif
                            </button>
                        </th>


                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('users.name')">
                               ASSIGN BY
                                @if(isset($sorts['mname']))
                                    @if($sorts['mname'] == 'asc')
                                        &uarr;
                                    @else
                                        &darr;
                                    @endif
                                    @else
                                    &uarr; &darr;
                                    @endif
                            </button>
                        </th>

                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">

                            Email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('website')">
                                Website
                                 @if(isset($sorts['website']))
                                     @if($sorts['website'] == 'asc')
                                         &uarr;
                                     @else
                                         &darr;
                                     @endif

                                 @else
                                 &uarr; &darr;
                                 @endif
                             </button>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('couname')">
                                Country
                                 @if(isset($sorts['couname']))
                                     @if($sorts['couname'] == 'asc')
                                         &uarr;
                                     @else
                                         &darr;
                                     @endif
                                     @else
                                     &uarr; &darr;
                                     @endif
                             </button>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('stname')">
                                State
                                 @if(isset($sorts['stname']))
                                     @if($sorts['stname'] == 'asc')
                                         &uarr;
                                     @else
                                         &darr;
                                     @endif
                                     @else
                                     &uarr; &darr;
                                     @endif
                             </button>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            <button wire:click="sortBy('cityname')">
                                City
                                 @if(isset($sorts['cityname']))
                                     @if($sorts['cityname'] == 'asc')
                                         &uarr;
                                     @else
                                         &darr;
                                     @endif
                                     @else
                                     &uarr; &darr;
                                     @endif
                             </button>
                        </th>
                        <th scope="col" class="px-6 py-3">

                            <button wire:click="sortBy('timezone')">
                                Timezone
                                 @if(isset($sorts['timezone']))
                                     @if($sorts['timezone'] == 'asc')
                                         &uarr;
                                     @else
                                         &darr;
                                     @endif
                                     @else
                                     &uarr; &darr;
                                     @endif
                             </button>
                        </th>

                        <th scope="col" class="px-6 py-3 sticky right-0 bg-gray-50">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($account as $accounts)
                        @php
                            $companyphone = array_unique(explode(',', $accounts->clpp));
                            $clientphone = array_unique(explode(',', $accounts->clp));
                            $companymails = array_unique(explode(',', $accounts->companymail));
                            $couname = array_unique(explode(',', $accounts->couname));
                            $stname = array_unique(explode(',', $accounts->stname));
                            $timezone = array_unique(explode(',', $accounts->timezone));
                            $city = array_unique(explode(',', $accounts->cityname));
                            $accountname = explode(' ', $accounts->name);
                        @endphp
                        @php
                            $c1 = substr($accountname[0], 0, 1);
                            if (array_key_exists(1, $accountname)) {
                                $c2 = substr($accountname[1], 0, 1);
                            } else {
                                $c2 = '';
                            }
                            if (array_key_exists(2, $accountname)) {
                                $c3 = substr($accountname[2], 0, 1);
                            } else {
                                $c3 = '';
                            }
                        @endphp
                        <tr wire:key="{{ $accounts->id }}"
                            class="group bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4 sticky left-0 bg-white group-hover:bg-gray-50">
                                <div class="flex items-center">
                                    <input wire:model="selected" value="{{ $accounts->id }}"
                                        id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="account/update/{{ $accounts->id }}">{{ $accounts->id }}</a>
                            </td>

                            <td class="px-6 py-4">
                                <a style="display: inline-flex;" href="account/update/{{ $accounts->id }}"
                                    class="felx items-center gap-2 pr-2">
                                    <img src="https://ui-avatars.com/api/?name= {{ $c1 }}+{{ $c2 }}+{{ $c3 }}&color=7F9CF5&  background=random&size=28&rounded=true"
                                        alt="Image">
                                    <p>{{ $accounts->name }}</p>

                                </a>
                            </td>
                            <td class="px-6 py-4">
                                @if ($unassign != "ua")
                                {{ $accounts->user_name }}
                                @endif
                            </td>


                            <td class="px-6 py-4">
                                @if ($unassign != "ua")
                                {{ $accounts->mname }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-col justify-center">
                                    @foreach ($companyphone as $val)
                                        @php
                                            $val = array_unique(explode('-', $val));
                                        @endphp
                                        <div class="flex gap-2">
                                            <a href="#"
                                                wire:click="openModal('{{ $val[0] }}','  {{ $accounts->name }}','{{ $accounts->id }}')">
                                                <div class="flex items-center gap-1">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                        class="w-4 h-4 text-green-600">
                                                        <path fill="currentColor"
                                                            d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863t-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3" />
                                                    </svg> {{ $val[0] }}
                                                </div>
                                            </a>
                                            @php
                                                try {
                                                    echo '<span>(' . $val[1] . ')</span>';
                                                } catch (\Throwable $th) {
                                                }
                                            @endphp
                                        </div>
                                    @endforeach

                                    @foreach ($clientphone as $val)
                                        @php
                                            $val = array_unique(explode('-', $val));
                                        @endphp
                                        @if ($val[0])
                                            <div class="flex gap-2">
                                                <a href="#"
                                                    wire:click="openModal('{{ $val[0] }}','  {{ $accounts->name }}','{{ $accounts->id }}')">
                                                    <div class="flex items-center gap-1">
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="w-4 h-4 text-green-600">
                                                            <path fill="currentColor"
                                                                d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863t-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3" />
                                                        </svg>{{ $val[0] }}
                                                    </div>
                                                </a>
                                                @php

                                                    try {
                                                        echo '<span>(' . $val[1] . ')</span>';
                                                    } catch (\Throwable $th) {
                                                    }
                                                @endphp
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                @foreach ($companymails as $val)
                                    <a href="mailto:{{ $val }}">{{ $val }}</a><br>
                                @endforeach
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ $accounts->website }}" target="_blank">{{ $accounts->website }}</a>
                            </td>
                            <td class="px-6 py-4">
                                @if (!empty($couname))
                                    {{ $couname[0] }}
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if (!empty($stname))
                                    @if ($stname[0] != 'select states' || $stname[0] != 'select states	')
                                        {{ $stname[0] }}
                                    @endif
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if (!empty($city))
                                    @if ($stname[0] != 'select cities' || $stname[0] != 'select cities	')
                                        {{ $city[0] }}
                                    @endif
                                @endif
                            </td>
                            <td class="px-6 py-4">
                                @if (!empty($timezone))
                                    {{ $timezone[0] }}
                                @endif
                            </td>

                            <td class="sticky right-0 px-6 py-4 bg-white group-hover:bg-gray-50">
                                {{-- @can('accounts.edit') --}}
                               <table>
                                <tr>
                                <td> <a href="account/update/{{ $accounts->id }}">
                                    <x-lucide-pencil style="color: #3253e6" width="20" height="20" />
                                </a></td><td>
                                {{-- @endcan --}}
                                {{-- @cannot('accounts.edit') --}}
                                <a href="account/view/{{ $accounts->id }}">
                                    <x-lucide-eye style="color: #ac1db9" width="20" height="20" />
                                </a>
                                {{-- @endcannot --}}
                            </td>
                                </tr>
                            </table>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $account->links() }}
        </div>

        {{-- Assign Modal --}}
        @if ($assignModal)
            <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="relative p-4 w-full max-w-md max-h-full">
                    <div class="relative bg-gray-200 rounded-lg shadow dark:bg-gray-700">
                        <button wire:click="assignCloseModal" type="button"
                            class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                fill="none" viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                        <div class="p-4 md:p-5 text-center">
                            <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                to Assign {{ count($selected) }} Companies?</h3>
                            <button wire:click="assignCompanies" type="button"
                                class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Yes, I'm sure
                            </button>
                            <button wire:click="assignCloseModal" type="button"
                                class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                cancel</button>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!-- Modal -->
        @if ($isOpen)
            <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                    <!-- Modal content -->
                    <div class="px-4 py-5 sm:p-6">
                        <h3 class="text-lg font-medium text-gray-900">{{ $companymodalData }}</h3>
                        <p> Do You Want To Call On This Number {{ $modalData }}</p>

                    </div>
                    <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <a onclick="onClick({{ $company_id }})" href="callto:{{ $modalData }}"
                            wire:click="opennewModal({{ $company_id }})"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Yes
                        </a>&nbsp;&nbsp;
                        <button wire:click="closeModal" type="button"
                            class="bg-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Cancel
                        </button>

                    </div>
                </div>
            </div>
        @endif

        <!-- Modal -->
        @if ($isOpennew)
            <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div
                    class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                    <!-- Modal content -->
                    <div class="px-4 py-5 sm:p-6">
                        <div class="flex justify-between">
                            <h3 class="text-lg font-medium text-gray-900">All Disposition</h3>
                            <button wire:click="openHistory"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Call
                                history</button>
                        </div>
                        <form wire:submit.prevent="disposubmission">
                            <div class="grid gap-6 mb-6 md:grid-cols-2">
                                <div>
                                    <label for="disposition_status"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disposition
                                        Type</label>
                                    <select wire:change='opentimedata' name="disposition_status"
                                        wire:model="disposition_status"
                                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                             focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                              dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                        <option value="">---Select Disposition---</option>
                                        <option value="Doesn't Qualify">Doesn't Qualify</option>
                                        <option value="Sale">Sale</option>
                                        <option value="No Answer">No Answer</option>
                                        <option value="Answering Machine">Answering Machine</option>
                                        <option value="Hang Up">Hang Up</option>
                                        <option value="Disconnected Number">Disconnected Number</option>
                                        <option value="Not Interested">Not Interested </option>
                                        <option value="Wrong Number">Wrong Number</option>
                                        <option value="Number Not In Service">Number Not In Service</option>
                                        <option value="Interested">Interested </option>
                                        <option value="Follow Up">Follow Up </option>
                                        <option value="Busy Number">Busy Number</option>
                                        <option value="Call Back">Call Back </option>
                                        <option value="Cancel">Cancel </option>
                                        <option value="Authority Not Available">Authority Not Available</option>
                                        <option value="Cancel">Cancel </option>
                                        <option value="Do Not Call">Do Not Call </option>
                                        <option value="In House">In House</option>
                                        <option value="Already Client">Already Client</option>
                                    </select>
                                </div>
                                <div>
                                    @error('disposition_status')
                                        <span class="error" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>

                            </div>
                            @if ($isOpentime)
                                <div class="mb-6">
                                    <label for="dispo_date"
                                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Schedule
                                        Date</label>
                                </div>

                                <div class="mb-6">
                                    <div class="relative max-w-sm">
                                        <input name="disposition_date" wire:model="disposition_date" datepicker
                                            datepicker-orientation="bottom right" type="date"
                                            class="bg-gray-50 border border-gray-300 text-gray-900
                            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                            ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                             dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                            placeholder="Select date">
                                    </div>
                                </div>
                                <div>
                                    @error('disposition_date')
                                        <span class="error" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-6">
                                    <label for="disposition_time"
                                        class="block mb-2 text-sm font-medium text-gray-900
                         dark:text-white">Schedule
                                        Time</label>
                                    <div class="flex">
                                        <input type="time" name="disposition_time" wire:model="disposition_time"
                                            id="time"
                                            class="flex-shrink-0 rounded-none rounded-s-lg bg-gray-50 border
                           text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500
                            block text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600
                             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                              dark:focus:border-blue-500"
                                            min="09:00" max="18:00" value="00:00">
                                        <select id="timezones" name="disposition_timezone"
                                            wire:model="disposition_timezone"
                                            class="bg-gray-50 border border-s-0 border-gray-300 text-gray-900 text-sm rounded-e-lg
                         focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700
                          dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                           dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                            <option value="EST" selected>EST - GMT-5 (New York)</option>
                                            <option value="PST">PST - GMT-8 (Los Angeles)</option>
                                            <option value="GMT">GMT - GMT+0 (London)</option>
                                            <option value="CET">CET - GMT+1 (Paris)</option>
                                            <option value="JST">JST - GMT+9 (Tokyo)</option>
                                            <option value="AEDT">AEDT - GMT+11 (Sydney)</option>
                                            <option value="MST">MST - GMT-7 (Canada)</option>
                                            <option value="CST">CST - GMT-6 (Canada)</option>
                                            <option value="EST">EST - GMT-5 (Canada)</option>
                                            <option value="CET">CET - GMT+1 (Berlin)</option>
                                            <option value="GST">GST - GMT+4 (Dubai)</option>
                                            <option value="SGT">SGT - GMT+8 (Singapore)</option>
                                            <option value="IST">IST - GMT+5 (Mumbai,Kolkata,Delhi)</option>
                                        </select>
                                    </div>
                                </div>
                                <div>
                                    @error('disposition_time')
                                        <span class="error" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div>
                                    @error('disposition_timezone')
                                        <span class="error" style="color: red">{{ $message }}</span>
                                    @enderror
                                </div>
                            @endif

                            <div class="mb-6">
                                <label for="dispo_message"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                                <textarea id="dispo_message" name="dispo_message" wire:model="dispo_message" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Write your thoughts here..."></textarea>
                            </div>

                            <button onclick="onSubmit()" type="submit"
                                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                        </form>

                    </div>
                    <div class="hidden px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">

                    </div>
                </div>
            </div>
            @push('scripts')
            <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
            <script>
                window.addEventListener('beforeunload', function(event) {
                    console.log("asgkhsd");
                    var id = @php echo $company_id; @endphp;
                    var url = "{{route('account.api-data1')}}";
                    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
                    $.ajax({
                        url: url,
                        type: 'POST',
                        data: {_token: CSRF_TOKEN, id: id},
                        dataType: 'JSON',
                        success: function (data) {
                            console.log("ok");
                        }
                    });
                });
            </script>
            @endpush


        @endif

        @if ($isOpenHistory)
            <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                    <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                </div>
                <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all  sm:w-full"
                    style="max-width: 100vh;">
                    <!-- Modal content -->

                    {{-- <div class="px-4 py-5 sm:p-6 space-y-2">
                        <h3 class="text-lg font-medium text-gray-900">{{ $companymodalData }}</h3>
                        <div class=" flex flex-col">
                            <div class="overflow-x-auto flex-grow" style="max-height: 50vh;">
                                <table class="min-w-full divide-y divide-gray-200 ">
                                    <thead class="bg-blue-700">
                                        <tr class="text-white">
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                Phone</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                Status</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                Follow up date</th>
                                            <th
                                                class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">
                                                Discription</th>

                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        @foreach ($dispositions as $disposition)
                                            <tr class="bg-gray-50">
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->phone }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->status }}
                                                </td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $disposition->followup_date }}</td>
                                                <td class="px-6 py-4 whitespace-nowrap">
                                                    {{ $disposition->description }}</td>
                                            </tr>
                                        @endforeach


                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <button wire:click="closeHistory"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Go
                            Back</button>

                    </div>
                    <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    </div> --}}
                    <div class="pl-8 pr-4 py-6 sm:px-6 overflow-y-auto h-[500px]">
                        <div class="flex justify-between items-center py-5">
                            <h3 class="text-lg font-medium text-gray-900 pb-3">{{ $companymodalData }}</h3>

                            <button wire:click="closeHistory" type="button"
                                class="px-3 py-2 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 24 24">
                                    <path fill="currentColor" d="m9 18l-6-6l6-6l1.4 1.4L6.8 11H21v2H6.8l3.6 3.6z" />
                                </svg>
                                <span class="pl-2">
                                    Go back
                                </span>

                            </button>
                        </div>
                        <ol class="relative border-s border-gray-200 dark:border-gray-700 ">
                            @foreach ($dispositions as $disposition)
                                <li class="mb-10 ms-6">
                                    <span
                                        class="absolute flex items-center justify-center w-6 h-6 bg-blue-100 rounded-full -start-3 ring-8 ring-white dark:ring-gray-900 dark:bg-blue-900">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <img class="h-10 w-10 rounded-full"
                                                src="https://avatar.iran.liara.run/public/boy?username={{ $disposition->name }}"
                                                alt="">
                                        </div>
                                    </span>
                                    <div
                                        class="p-4 bg-white border border-gray-200 rounded-lg shadow-sm dark:bg-gray-700 dark:border-gray-600">
                                        <div class="items-center justify-between mb-3 sm:flex">
                                            <time class="mb-1 text-xs font-normal text-gray-400 sm:order-last sm:mb-0">
                                                {{ $disposition->created_at }}
                                            </time>
                                            <div class="text-sm font-normal text-gray-500 lex dark:text-gray-300">
                                                {{ $disposition->name }} <span
                                                    class="font-semibold text-gray-900 dark:text-white hover:underline">-{{ $disposition->status }}
                                                    @if ($disposition->followup_date)
                                                        on {{ $disposition->followup_date }}
                                                    @endif
                                                </span>
                                            </div>
                                        </div>
                                        <div
                                            class="p-3 mb-3 text-xs italic font-normal text-gray-500 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-600 dark:border-gray-500 dark:text-gray-300">
                                            {{ $disposition->description }}

                                        </div>


                                    </div>
                                </li>
                            @endforeach


                        </ol>
                    </div>




                </div>
            </div>
        @endif

    </section>
