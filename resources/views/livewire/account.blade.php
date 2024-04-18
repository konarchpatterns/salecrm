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

        th, td {
            text-wrap: nowrap;
        }
    </style>

<style>
    .inline-container {
      display: inline-block;
      vertical-align: middle; /* Optional: Aligns the image and text vertically */
    }
    .inline-container img {
      vertical-align: middle; /* Optional: Aligns the image and text vertically */
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
                            Name
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Phone
                        </th>

                        <th scope="col" class="px-5 py-2">
                            Email
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Website
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Fax
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Country
                        </th>
                        <th scope="col" class="px-5 py-2">
                            State
                        </th>
                        <th scope="col" class="px-5 py-2">
                            City
                        </th>
                        <th scope="col" class="px-5 py-2">
                            Time Zone
                        </th>
                        <th scope="col" align="right" class="px-5 py-2">
                            Action
                        </th>
                        {{-- <th scope="col" class="px-5 py-2 text-right">
                            Actions
                        </th> --}}
                    </tr>
                </thead>
                <tbody>

                    @foreach ($account as $accounts)
                    @php
                        $companyphone=array_unique(explode(",",$accounts->clpp));
                        $clientphone=array_unique(explode(",",$accounts->clp));
                        $companymails=array_unique(explode(",",$accounts->companymail));
                        $couname=array_unique(explode(",",$accounts->couname));
                        $stname=array_unique(explode(",",$accounts->stname));
                        $timezone=array_unique(explode(",",$accounts->timezone));
                        $city=array_unique(explode(",",$accounts->cityname));
                        $accountname=explode(" ",$accounts->name);
                    @endphp
                       @php
                       $c1=substr($accountname[0], 0, 1);
                       if(array_key_exists(1,$accountname))
                       {
                            $c2=substr($accountname[1], 0, 1);
                       }
                       else{
                        $c2="";
                       }
                       if(array_key_exists(2,$accountname))
                       {
                            $c3=substr($accountname[2], 0, 1);
                       }
                       else{
                        $c3="";
                       }
                    @endphp

                        <tr class="border-b dark:border-gray-700">
                            <td class="px-4 py-3 text-right"> <a href="account/update/{{ $accounts->id }}">{{ $accounts->id }}</a>
                                {{-- <img style="vertical-align: middle;" src="https://ui-avatars.com/api/?name={{ $c1 }}+{{ $c2 }}+{{ $c3 }}&color=7F9CF5&background=random&size=38&rounded=true" alt="Image"> --}}
                            </td>
                            <td class="px-4 py-3">


                                    <a style="display: inline-flex;" href="account/update/{{ $accounts->id }}">
                                    <img src="https://ui-avatars.com/api/?name={{ $c1 }}+{{ $c2 }}+{{ $c3 }}&color=7F9CF5&background=random&size=28&rounded=true"
                                    alt="Image">

                                           &nbsp;&nbsp; {{ $accounts->name }}
                                        </a>


                        </td>
                            <td class="px-4 py-3">
                                @foreach ($companyphone as $val)
                                {{-- <a href="callto:{{ $val }}">{{$val}}</a> --}}

                                <a href="#" wire:click="openModal('{{$val}}','{{$accounts->name}}','{{$accounts->id}}')">{{$val}}</a>
                               <br>


                            @endforeach

                            @foreach ($clientphone as $val)
                            <a href="#" wire:click="openModal('{{$val}}','{{$accounts->name}}','{{$accounts->id}}')">{{$val}}</a><br>
                        @endforeach
                            </td>
                            <td class="px-4 py-3">
                                @foreach ($companymails as $val)
                                <a href="mailto:{{ $val }}">{{$val}}</a><br>
                            @endforeach
                            </td>
                            <td class="px-4 py-3"><a  href="{{$accounts->website}}" target="_blank">{{ $accounts->website }}</a></td>
                            <td class="px-4 py-3"> {{ $accounts->fax }}</td>
                            <td class="px-4 py-3">
                                @if(!empty($couname))
                                 {{ $couname[0] }}
                                 @endif
                                </td>
                            <td class="px-4 py-3">
                                @if(!empty($stname))
                                @if(($stname[0]!="select states")||($stname[0]!="select states	"))
                                {{ $stname[0] }}
                                @endif
                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(!empty($city))
                                @if(($stname[0]!="select cities")||($stname[0]!="select cities	"))
                                {{ $city[0] }}
                                @endif

                                @endif
                            </td>
                            <td class="px-4 py-3">
                                @if(!empty($timezone))
                                {{ $timezone[0] }}
                                @endif
                            </td>
                            <td class="px-4 py-3" align="right">
                                @can('accounts.edit')
                                <a href="account/update/{{ $accounts->id }}">
                                    <x-lucide-pencil style="color: #3253e6" width="20" height="20" />
                                </a>
                                @endcan
                                @cannot('accounts.edit')
                                <a href="account/update/{{ $accounts->id }}">
                                    <x-lucide-eye style="color: #ac1db9" width="20" height="20" />
                                </a>
                                @endcannot
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="space-y-3 md:space-y-0 p-4" aria-label="Table navigation">
            {{ $account->links() }}
        </div>


  <!-- Modal -->
  @if($isOpen)
  <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
          <!-- Modal content -->
          <div class="px-4 py-5 sm:p-6">
              <h3 class="text-lg font-medium text-gray-900">{{ $companymodalData }}</h3>
              <p> Do You Want To Call On This Number {{ $modalData }}</p>

          </div>
          <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
            <a href="callto:{{ $modalData }}" wire:click="opennewModal" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                Yes
            </a>&nbsp;&nbsp;
             <button wire:click="closeModal" type="button" class="bg-red-700 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                  Cancel
              </button>
          </div>
      </div>
  </div>


  @endif




  <!-- Modal -->
  @if($isOpennew)
  <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
      <div class="fixed inset-0 transition-opacity" aria-hidden="true">
          <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
      </div>
      <div class="bg-white rounded-lg overflow-hidden shadow-xl transform transition-all sm:max-w-lg sm:w-full">
          <!-- Modal content -->
          <div class="px-4 py-5 sm:p-6">
              <h3 class="text-lg font-medium text-gray-900">All Disposition</h3>

                <form wire:submit.prevent="disposubmission">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label for="disposition_status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Disposition Type</label>
                            <select wire:change='opentimedata' name="disposition_status" wire:model="disposition_status" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg
                             focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700
                              dark:border-gray-600 dark:placeholder-gray-400 dark:text-white
                               dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <option value="">---Select Disposition---</option>
                                <option value="Doesn't Qualify">Doesn't Qualify</option>
                                <option value="Sale">Sale</option>
                                <option  value="No Answer">No Answer</option>
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
                        @error('disposition_status') <span class="error" style="color: red">{{ $message }}</span> @enderror
                    </div>

                    </div>
                    @if($isOpentime)
                    <div class="mb-6">
                        <label for="dispo_date"
                        class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Schedule Date</label>
                    </div>

                    <div class="mb-6">
                        <div class="relative max-w-sm">
                            <input name="disposition_date" wire:model="disposition_date"
                            datepicker datepicker-orientation="bottom right"
                            type="date" class="bg-gray-50 border border-gray-300 text-gray-900
                            text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full
                            ps-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                             dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                             placeholder="Select date">
                          </div>
                        </div>
                        <div>
                            @error('disposition_date') <span class="error" style="color: red">{{ $message }}</span> @enderror
                        </div>
                    <div class="mb-6">
                        <label for="disposition_time" class="block mb-2 text-sm font-medium text-gray-900
                         dark:text-white">Schedule Time</label>
                        <div class="flex">
                        <input type="time"
                         name="disposition_time" wire:model="disposition_time" id="time"
                          class="flex-shrink-0 rounded-none rounded-s-lg bg-gray-50 border
                           text-gray-900 leading-none focus:ring-blue-500 focus:border-blue-500
                            block text-sm border-gray-300 p-2.5 dark:bg-gray-700 dark:border-gray-600
                             dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500
                              dark:focus:border-blue-500" min="09:00" max="18:00" value="00:00">
                        <select id="timezones" name="disposition_timezone"  wire:model="disposition_timezone"
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
                        @error('disposition_time') <span class="error" style="color: red">{{ $message }}</span> @enderror
                    </div>
                    <div>
                        @error('disposition_timezone') <span class="error" style="color: red">{{ $message }}</span> @enderror
                    </div>
                @endif

                    <div class="mb-6">
                        <label for="dispo_message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
                        <textarea id="dispo_message" name="dispo_message" wire:model="dispo_message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write your thoughts here..."></textarea>
                    </div>

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
                </form>


          </div>
          <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">


          </div>
      </div>
  </div>
  @endif

    </section>
