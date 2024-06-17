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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-500
                            focus:border-primary-500 block w-1/3 pl-10 p-2 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                             dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                            placeholder="Search">
                    </div>
                    
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
                            Client
                        </th>
                        <th scope="col" class="px-5 py-2">
                            phone
                        </th>
                        <th scope="col" class="px-5 py-2">
                            email
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Company Name
                        </th>
                        <th scope="col" class="px-5 py-2 text-right">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($clients as $client)
                        @php
                            $phones = array_unique(explode(',',$client->clpp));
                            $emails = array_unique(explode(',', $client->clmm));
                        @endphp
                        <tr wire:key="{{ $client->id }}" class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 text-right">{{ $client->id }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-10 w-10">
                                        <img class="h-10 w-10 rounded-full"
                                            src="https://avatar.iran.liara.run/public/boy?username={{ $client->fname }}"
                                            alt="">
                                    </div>
                                    <div class="ml-4">
                                        <div class="text-sm font-medium text-gray-900 flex gap-2">
                                            {{ $client->fname }} {{$client->lname}}
                                            @if ($client->linkdinurl)
                                            <a href="{{$client->linkdinurl}}" target="_blank">
                                                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" viewBox="0 0 48 48" class="h-5 w-5">
                                                    <path fill="#0078d4" d="M42,37c0,2.762-2.238,5-5,5H11c-2.761,0-5-2.238-5-5V11c0-2.762,2.239-5,5-5h26c2.762,0,5,2.238,5,5	V37z"></path><path d="M30,37V26.901c0-1.689-0.819-2.698-2.192-2.698c-0.815,0-1.414,0.459-1.779,1.364	c-0.017,0.064-0.041,0.325-0.031,1.114L26,37h-7V18h7v1.061C27.022,18.356,28.275,18,29.738,18c4.547,0,7.261,3.093,7.261,8.274	L37,37H30z M11,37V18h3.457C12.454,18,11,16.528,11,14.499C11,12.472,12.478,11,14.514,11c2.012,0,3.445,1.431,3.486,3.479	C18,16.523,16.521,18,14.485,18H18v19H11z" opacity=".05"></path><path d="M30.5,36.5v-9.599c0-1.973-1.031-3.198-2.692-3.198c-1.295,0-1.935,0.912-2.243,1.677	c-0.082,0.199-0.071,0.989-0.067,1.326L25.5,36.5h-6v-18h6v1.638c0.795-0.823,2.075-1.638,4.238-1.638	c4.233,0,6.761,2.906,6.761,7.774L36.5,36.5H30.5z M11.5,36.5v-18h6v18H11.5z M14.457,17.5c-1.713,0-2.957-1.262-2.957-3.001	c0-1.738,1.268-2.999,3.014-2.999c1.724,0,2.951,1.229,2.986,2.989c0,1.749-1.268,3.011-3.015,3.011H14.457z" opacity=".07"></path><path fill="#fff" d="M12,19h5v17h-5V19z M14.485,17h-0.028C12.965,17,12,15.888,12,14.499C12,13.08,12.995,12,14.514,12	c1.521,0,2.458,1.08,2.486,2.499C17,15.887,16.035,17,14.485,17z M36,36h-5v-9.099c0-2.198-1.225-3.698-3.192-3.698	c-1.501,0-2.313,1.012-2.707,1.99C24.957,25.543,25,26.511,25,27v9h-5V19h5v2.616C25.721,20.5,26.85,19,29.738,19	c3.578,0,6.261,2.25,6.261,7.274L36,36L36,36z"></path>
                                                    </svg>
                                            
                                                </a>
                                            @endif
                                        </div>
                                        <div class="text-sm text-gray-500">
                                            {{ $client->designation }}
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 ">
                                @foreach ($phones as $phone)
                                    @php
                                        $var = array_unique(explode('-', $phone));
                                    @endphp
                                    <div>
                                        <div class="flex gap-1 items-center">
                                            @if ($var[0])
                                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            class="w-4 h-4 text-green-600">
                                            <path fill="currentColor"
                                                d="M19.95 21q-3.125 0-6.175-1.362t-5.55-3.863t-3.862-5.55T3 4.05q0-.45.3-.75t.75-.3H8.1q.35 0 .625.238t.325.562l.65 3.5q.05.4-.025.675T9.4 8.45L6.975 10.9q.5.925 1.187 1.787t1.513 1.663q.775.775 1.625 1.438T13.1 17l2.35-2.35q.225-.225.588-.337t.712-.063l3.45.7q.35.1.575.363T21 15.9v4.05q0 .45-.3.75t-.75.3" />
                                        </svg>
                                        <button wire:click="openModal('{{$var[0]}}', '{{$client->companyId}}', '{{$client->fname }}','{{$client->id}}')">
                                            {{$var[0]}}
                                        </button>{{$var[1] ?? null}}
                                            @endif
                                        </div>
                                    </div>
                                @endforeach
                            </td>
                            <td class="px-4 py-3">
                                @foreach ($emails as $email)
                                @php
                                    $mail = array_unique(explode('-', $email));
                                @endphp
                                <div class="flex items-center gap-1">
                                    @if ($mail[0])
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-green-600" viewBox="0 0 24 24"><path fill="currentColor" d="m20 8l-8 5l-8-5v10h16zm0-2H4l8 4.99z" opacity=".3"/><path fill="currentColor" d="M4 20h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2M20 6l-8 4.99L4 6zM4 8l8 5l8-5v10H4z"/></svg>
                                    
                                    <a href="mailto:{{$mail[0]}}" >{{$mail[0]}}
                                    </a> - {{$mail[1] ?? null}}
                                    @endif
                                </div>
                                @endforeach
                            </td>
                            <td class="px-4 py-3"> {{ $client->cname }}</td>
                            <td class="px-4 py-3 ">
                                <a href="clients/update/{{ $client->id }}" class="text-blue-600 flex justify-end">
                                    <svg class="w-6 h-6"
                                        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                        </path>
                                    </svg>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $clients->links() }}
        </div>
        @if ($modal)
        <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
            <div class="fixed inset-0 transition-opacity" aria-hidden="true">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
            </div>
            <div
                class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
                <!-- Modal content -->
                <div class="px-4 py-5 sm:p-6">
                    <h3 class="text-lg font-medium text-gray-900">{{$cname}}</h3>
                    <p> Do You Want To Call On This Number {{$callto}}</p>

                </div>
                <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                    <a onclick="onClick({{$company_id}})" wire:click="opennewModal({{ $company_id }})" href="callto:{{$callto}}"
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
                    <div class="pl-8 pr-4 py-6 sm:px-6 overflow-y-auto h-[500px]">
                        <div class="flex justify-between items-center py-5">
                            <h3 class="text-lg font-medium text-gray-900 pb-3">{{ $cname }}</h3>

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
