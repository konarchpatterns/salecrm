<div class="flex flex-col">
  
        <div class="overflow-x-auto space-y-2 ">
            <div class="flex justify-between text-xl font-bold">
                <p>BDE Users Summary</p>
                <input wire:model="search" type="search" placeholder="search" class="border rounded-lg" min="2000-01-01" max="3000-12-31" />
            </div>
            <table class="w-full text-sm text-center text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-5 py-2 text-right">
                            ID
                        </th>
                        <th scope="col" class="px-5 py-2">
                            user name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Currently Assigned company
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($bdeUsers as $bdeUser)
                        <tr wire:key="{{$bdeUser->id}}"  class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 text-right">{{$bdeUser->id}}</td>
                            <td class="px-4 py-3">
                                <a href="reports/user-info/{{$bdeUser->id}}">{{$bdeUser->name}}</a>
                            </td>
                            <td class="px-4 py-3"> {{$bdeUser->company_count}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $bdeUsers->links() }}
        </div>
    
    
</div>
