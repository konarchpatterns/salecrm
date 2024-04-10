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
                            First name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Last name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Designation
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Company name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Linkdin url
                        </th>
                        <th scope="col" class="px-5 py-2 ">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($clients as $client)

                        <tr wire:key="{{$client->id}}" class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 text-right">{{ $client->id }}</td>
                            <td class="px-4 py-3">{{ $client->fname }}</td>
                            <td class="px-4 py-3"> {{ $client->lname }}</td>
                            <td class="px-4 py-3"> {{ $client->designation }}</td>
                            <td class="px-4 py-3"> {{ $client->cname }}</td>
                            <td class="px-4 py-3"> {{ $client->linkdinurl }}</td>
                            <td class="px-4 py-3">
                                 <a href="clients/update/{{$client->id}}" class="text-blue-600"><svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z">
                                    </path>
                                </svg></a>

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $clients->links() }}
        </div>
    </section>

