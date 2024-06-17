<div class="relative overflow-x-hidden shadow-md sm:rounded-lg">
    <div class="flex items-center justify-end flex-column flex-wrap md:flex-row space-y-4 md:space-y-0 pb-4 bg-white dark:bg-gray-900">
        <label for="table-search" class="sr-only">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                </svg>
            </div>
            <input wire:model.live="search" type="text" id="table-search-users" class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search for users">
        </div>
    </div>
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 ">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Title
                </th>
                <th scope="col" class="px-6 py-3">
                    Description
                </th>
                <th scope="col" class="px-6 py-3">
                    Priority
                </th>
                <th scope="col" class="px-6 py-3">
                    Start Date
                </th>
                <th scope="col" class="px-6 py-3">
                    End Date
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)  
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$event->title}}
                </th>
                <td class="px-6 py-4">
                    {{$event->discription}}
                </td>
                <td class="px-6 py-4">
                    <div class="flex items-center">
                        @if ($event->priority == "low")
                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                        @elseif ($event->priority == 'medium')
                        <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                        @else
                        <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                        @endif
                        {{$event->priority}}
                    </div>
                </td>
                <td class="px-6 py-4">
                    {{$event->start_date}}
                </td>
                <td class="px-6 py-4">
                    {{$event->end_date}}
                </td>
                <td class="px-6 py-4">
                    <a href="{{route('event.edit', ['id'=>$event->id ])}}">
                        <x-lucide-pencil style="color: #3253e6" width="20" height="20" />
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
        {{ $events->links() }}
    </div>
</div>

