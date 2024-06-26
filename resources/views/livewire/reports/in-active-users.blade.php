<div>
    <div class="overflow-x-auto space-y-2 ">
        <div class="flex justify-between text-xl font-bold">
            <p>BDE In-active Users Summary</p>
            <input wire:model.live="search" type="search" placeholder="search" class="border rounded-lg" />
        </div>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr class="">
                    <th scope="col" class="px-5 py-2 text-right">
                        ID
                    </th>
                    <th scope="col" class="px-5 py-2">
                        user name
                    </th>
                    <th scope="col" class="px-5 py-2">
                        Call made
                    </th>
                    <th scope="col" class="px-5 py-2">
                        Currently Assigned company
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bdeInActiveUsers as $bdeInActiveUser)
                    <tr wire:key="{{ $bdeInActiveUser->id }}" class="border-b dark:border-gray-700">
                        <td class="px-4 py-3 text-right">{{ $bdeInActiveUser->id }}</td>
                        <td class="px-4 py-3">
                            <a href="reports/user-info/{{ $bdeInActiveUser->id }}">{{ $bdeInActiveUser->name }}</a>
                        </td>
                        <td class="px-4 py-3">{{ $bdeInActiveUser->dispositions_count }} </td>
                        <td class="px-4 py-3"> {{ $bdeInActiveUser->company_count }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
        {{ $bdeInActiveUsers->links() }}
    </div>
</div>
