<x-app-layout>

    <x-content-layout title='Accounts'   secLink="account.create"  userButton="Add New Account" subtitle="Company Details" button='Go back' link="account.index">
        
<div id="accordion-collapse" data-accordion="collapse" class="pb-5">
    <h2 id="accordion-collapse-heading-1">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-1" aria-expanded="true" aria-controls="accordion-collapse-body-1">
        <span>Company Details</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-1" class="hidden" aria-labelledby="accordion-collapse-heading-1">
      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Company Name: </h4>
            <p class=" text-gray-500 dark:text-gray-400">{{$companyDetails[0]->name}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Website: </h4>
            <p class=" text-gray-500 dark:text-gray-400">{{$companyDetails[0]->website}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Fax No: </h4>
            <p class=" text-gray-500 dark:text-gray-400">{{$companyDetails[0]->fax}}</p>
        </div>
      </div>
    </div>
    <h2 id="accordion-collapse-heading-2">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-2" aria-expanded="false" aria-controls="accordion-collapse-body-2">
        <span>Other Details</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-2" class="hidden" aria-labelledby="accordion-collapse-heading-2">
      <div class="p-5 border border-b-0 border-gray-200 dark:border-gray-700">
                @foreach ($otherDetails as $otherDetail)
                <div class="flex items-center space-x-2">
                    <h4 class="font-semibold">Vendor Type: </h4>
                    <p class="text-gray-500 dark:text-gray-400">{{$otherDetail->type}}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <h4 class="font-semibold">Business Type: </h4>
                    <p class="text-gray-500 dark:text-gray-400">{{$otherDetail->business_type}}</p>
                </div>
                <div class="flex items-center space-x-2">
                    <h4 class="font-semibold">Description: </h4>
                    <p class="text-gray-500 dark:text-gray-400">{{$otherDetail->description}}</p>
                </div>
                @endforeach

                @if (count($otherDetails)<1)
                <div class="flex items-center space-x-2">
                    <h4 class="font-semibold">Vendor Type: </h4>
                    <p>-</p>
                </div>
                <div class="flex items-center space-x-2">
                    <h4 class="font-semibold">Business Type: </h4>
                    <p>-</p>
                </div>
                <div class="flex items-center space-x-2">
                    <h4 class="font-semibold">Description: </h4>
                    <p>-</p>
                </div>
                @endif   
      </div>
    </div>
    <h2 id="accordion-collapse-heading-3">
      <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-3" aria-expanded="false" aria-controls="accordion-collapse-body-3">
        <span>Address</span>
        <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
          <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
        </svg>
      </button>
    </h2>
    <div id="accordion-collapse-body-3" class="hidden" aria-labelledby="accordion-collapse-heading-3">
      <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Block No: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->block}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Street Name: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->street}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Address Line2: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->address}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">City: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->city_name}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">State: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->state_name}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Country: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->country_name}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Zip Code: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->zip}}</p>
        </div>
        <div class="flex items-center space-x-2">
            <h4 class="font-semibold">Time Zone: </h4>
            <p class="text-gray-500 dark:text-gray-400">{{$address[0]->timezone}}</p>
        </div>
      </div>
    </div>
    <h2 id="accordion-collapse-heading-4">
        <button type="button" class="flex items-center justify-between w-full p-5 font-medium rtl:text-right text-gray-500 border border-gray-200 focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-800 dark:border-gray-700 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-collapse-body-4" aria-expanded="false" aria-controls="accordion-collapse-body-4">
          <span>Contacts</span>
          <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
          </svg>
        </button>
    </h2>
    <div id="accordion-collapse-body-4" class="hidden" aria-labelledby="accordion-collapse-heading-4">
        <div class="p-5 border border-t-0 border-gray-200 dark:border-gray-700">
            @foreach ($emails as $email )
            <div class="flex items-center space-x-2 text-gray-500 dark:text-gray-400">
                <div class="flex items-center gap-2 mb-2">
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" 
                        class="h1- w-10" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" color="currentColor"><path d="m2 6l6.913 3.917c2.549 1.444 3.625 1.444 6.174 0L22 6"/><path d="M2.016 13.476c.065 3.065.098 4.598 1.229 5.733c1.131 1.136 2.705 1.175 5.854 1.254c1.94.05 3.862.05 5.802 0c3.149-.079 4.723-.118 5.854-1.254c1.131-1.135 1.164-2.668 1.23-5.733c.02-.986.02-1.966 0-2.952c-.066-3.065-.099-4.598-1.23-5.733c-1.131-1.136-2.705-1.175-5.854-1.254a115 115 0 0 0-5.802 0c-3.149.079-4.723.118-5.854 1.254c-1.131 1.135-1.164 2.668-1.23 5.733a69 69 0 0 0 0 2.952"/></g></svg>
                    </div>
                    <div>
                        <p class="text-black font-semibold">
                            {{$email->email}}
                        </p>
                        <p>{{$email->type}}</p>
                    </div>
                </div>
            </div>
            @endforeach 
            @foreach ($phones as $phone )
                <div class="flex items-center space-x-2 text-gray-500 dark:text-gray-400">
                    <div class="flex items-center gap-2">
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" 
                            class="h-10 w-10" viewBox="0 0 24 24"><path fill="currentColor" d="M18.93 20q-2.528 0-5.184-1.266t-4.944-3.555q-2.27-2.288-3.536-4.935T4 5.07q0-.45.3-.76T5.05 4h2.473q.408 0 .712.257t.411.659L9.142 7.3q.07.42-.025.733t-.333.513L6.59 10.592q.616 1.117 1.361 2.076t1.59 1.817q.87.87 1.874 1.62q1.004.749 2.204 1.414l2.139-2.177q.244-.263.549-.347q.304-.083.674-.033l2.103.43q.408.1.662.411t.254.712v2.435q0 .45-.31.75t-.76.3"/></svg>
                        </div>
                        <div>
                            <p class="text-black font-semibold">{{$phone->phone}}</p>
                            <p>{{$phone->type}}</p>
                        </div>
                    </div>
                    
                </div>
            @endforeach 
        </div>
    </div>
  </div>
  
        <livewire:accounts.company-contacts :companyId="$companyId"/>
        <div>
            <livewire:accounts.company-dispositions :companyId="$companyId"/>
        </div>
        
        <div class="space-y-4 mb-6">
            <div>
                <h2 class="text-center text-2xl font-bold ">Activity Log</h2>
            </div>
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
        @if (count($activity) == 0)
        <div id="emptyMessage" class="flex flex-col items-center justify-center py-10 px-4 text-center text-gray-500">
            <h2 class="text-xl font-semibold mb-2">No Data Available</h2>
            <p class="mb-4">We couldn't find any data to display.
            </p>
        </div>
        @endif
        </div>
    </x-content-layout>
</x-app-layout>