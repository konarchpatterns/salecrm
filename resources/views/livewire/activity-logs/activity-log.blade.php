<div>
    <div class="relative overflow-x-auto  sm:rounded-lg max-h-full">
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
                        Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Description
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Old Data
                    </th>
                    <th scope="col" class="px-6 py-3">
                        New Data
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($activity as $act)
                @php
                    $ch = json_decode($act->properties)
                @endphp
              
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                    <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        {{$act->id}}
                    </th>
                    <td class="px-6 py-4">
                        {{$act->name}}
                    </td>
                    <td class="px-6 py-4">
                        {{$act->event}}
                    </td>
                    <td class="px-6 py-4">
                        {{$act->description}}
                    </td>
                        <td class="px-6 py-4">
                            @php      
                            if($act->event == 'updated' || $act->event == 'deleted'){
                                try {
                                    foreach ($ch->old as $key =>$value) {
                                        echo $key. ": ". $value."<br />";
                                        }
                                    } catch (\Throwable $th) {
                                }
                            }
                            @endphp
                        </td>
                        <td class="px-6 py-4">
                            @php
                                if($act->event == 'updated' || $act->event == 'created'){
                                    try {
                                        foreach ($ch->attributes as $key =>         $value) {
                                            echo $key. ": ". $value."<br />";
                                            }
                                    } catch (\Throwable $th) {
                                    }
                                }
                            @endphp
                        </td>
                </tr>  
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
        {{ $activity->links() }}
    </div>
</div>