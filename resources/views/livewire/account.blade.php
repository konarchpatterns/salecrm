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

                                <a href="#" wire:click="openModal('{{$val}}','{{$accounts->name}}')">{{$val}}</a>
                               <br>


                            @endforeach

                            @foreach ($clientphone as $val)
                            <a href="#" wire:click="openModal('{{$val}}','{{$accounts->name}}')">{{$val}}</a><br>
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
              <h3 class="text-lg font-medium text-gray-900">fghfghfghfghfghfghgf</h3>
              <p> yoooo</p>

          </div>
          <div class="px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">


          </div>
      </div>
  </div>
  @endif


    </section>
