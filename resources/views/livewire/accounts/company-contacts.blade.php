<div>
    <div class="space-y-4 mb-6">
        <h2 class="text-center text-2xl font-bold ">Company Contacts</h2>
        {{-- <div class=" flex flex-col ">
            <div class="overflow-x-auto flex-grow " style="max-height: 50vh;">
                <table class="min-w-full divide-y divide-gray-200 ">
                    <thead class="bg-blue-700" style="position: sticky; top: 0; z:1;">
                        <tr class="text-white">
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Id</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Name</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Designation
                            </th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Phone</th>
                            <th class="px-6 py-3 text-left text-xs font-medium  uppercase tracking-wider">Email</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($contacts as $contact)
                            <tr class="bg-gray-50">
                                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->id }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    {{ $contact->fname }}{{ ' ' }}{{ $contact->lname }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">{{ $contact->designation }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $numbers = array_unique(explode(',', $contact->phones));
                                        foreach ($numbers as $number) {
                                            echo $number . '<br />';
                                        }
                                    @endphp
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $emails = array_unique(explode(',', $contact->emails));
                                        foreach ($emails as $email) {
                                            echo $email . '<br />';
                                        }
                                    @endphp
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
        </div> --}}
        <div class="relative overflow-x-auto  sm:rounded-lg max-h-[50vh]">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-10">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Designation
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Phone
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Email
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($contacts as $contact)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600" wire:key="{{ $contact->id }}">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $contact->id }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $contact->fname }}{{ ' ' }}{{ $contact->lname }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $contact->designation }}
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $numbers = array_unique(explode(',', $contact->phones));
                                foreach ($numbers as $number) {
                                    echo $number . '<br />';
                                }
                            @endphp
                        </td>
                        <td class="px-6 py-4">
                            @php
                                $emails = array_unique(explode(',', $contact->emails));
                                foreach ($emails as $email) {
                                    echo $email . '<br />';
                                }
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @if (count($contacts) == 0)
            <div id="emptyMessage" class="flex flex-col items-center    justify-center py-10 px-4 text-center text-gray-500">
                <h2 class="text-xl font-semibold mb-2">No Data Available</h2>
                <p class="mb-4">We couldn't find any data to display.
                </p>
            </div>
        @endif
    </div>
</div>
