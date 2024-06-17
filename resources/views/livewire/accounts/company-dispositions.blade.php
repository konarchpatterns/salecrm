<div>
    <div class="space-y-4 mb-6">
        <div>
            <h2 class="text-center text-2xl font-bold ">Company Dispositions </h2>
            <div class="flex justify-end">
                <input class="border rounded-md" wire:model.live='search' type="search" placeholder="Search" />
            </div>
        </div>

        {{-- old table --}}
        {{-- <div class=" flex flex-col">
            <div class="overflow-x-auto flex-grow" style="max-height: 50vh;">
                <table class="min-w-full divide-y divide-gray-200 ">
                    <thead class="bg-blue-700 " style="position: sticky; top:0; z:1;">
                        <tr class="text-white">
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">User</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Number</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Status</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Follow up Date
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Description
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">time</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">time zone</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($dispositions as $disposition)
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->name }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->phone }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->followup_date }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->discription }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->followup_time }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $disposition->timezone }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div> --}}

        <div class="relative overflow-x-auto  sm:rounded-lg ">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            User
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Number
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Status
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Description
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Follow up date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Time Zone
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dispositions as $disposition)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $disposition->name }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $disposition->phone }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $disposition->status }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $disposition->description }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $disposition->followup_date }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $disposition->followup_time }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $disposition->timezone }}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">{{$dispositions->links()}}</div>
        
        @if (count($dispositions) == 0)
        <div id="emptyMessage" class="flex flex-col items-center justify-center py-10 px-4 text-center text-gray-500">
            <h2 class="text-xl font-semibold mb-2">No Data Available</h2>
            <p class="mb-4">We couldn't find any data to display.
            </p>
        </div>
        @endif
    </div>
</div>
