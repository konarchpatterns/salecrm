<section class="yjGyQxv8jnYk9_MGMqLN zlFmyfujKXCLCPyPEOIS">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
            <div class="mt-5 md:mt-0">
                <form wire:submit.prevent="update">
                    <div class="shadow overflow-hidden sm:rounded-md">
                        <div class="px-4 py-5  bg-white sm:p-6">
                            <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                                Company Information</h2>
                            <div class="grid grid-cols-3  gap-2">
                                <div class="w-full">
                                    <label for="company" class="block text-sm font-medium text-gray-700">Company
                                        name</label>
                                    <input type="text" wire:model="name" autocomplete="name" {{-- @cannot('accounts.edit') disabled @endcannot --}}
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>

                                <div class="w-full">
                                    <label for="fax" class="block text-sm font-medium text-gray-700">Fax No</label>
                                    <input type="text" wire:model="fax" {{-- @cannot('accounts.edit') disabled @endcannot --}}
                                        autocomplete="family-name"
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                                <div class="w-full">
                                    <label for="website"
                                        class="block text-sm font-medium text-gray-700">Website</label>
                                    <input type="text" wire:model="website" {{-- @cannot('accounts.edit') disabled @endcannot --}}
                                        autocomplete="website"
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                </div>
                            </div>
                            <div class="grid grid-cols-3  gap-2">
                                <div class="w-full text-red-600">
                                    @error('name')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full text-red-600">
                                    @error('fax')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="w-full text-red-600">
                                    @error('website')
                                        <span class="error">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-span-6 sm:col-span-3 ">

                                <h2 class="mb-4 text-xl py-4 font-bold text-gray-900 dark:text-white">Contacts</h2>
                            </div>
                            
                            @foreach ($inputs as $key => $input)
                                <div class="grid grid-cols-3  gap-2 items-center">
                                    <div class="w-full">
                                        <input type="text" {{-- @cannot('accounts.edit') disabled @endcannot --}}
                                            id="input_{{ $key }}_companyphones"
                                            wire:model.defer="inputs.{{ $key }}.companyphones"
                                            class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="enter company phone" autocomplete="off">
                                        @error('inputs.' . $key . '.companyphones')
                                            <span class="text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">
                                        <select
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                                    shadow-sm focus:outline-none focus:ring-indigo-500
                                     focus:border-indigo-500 sm:text-sm"
                                            {{-- @cannot('accounts.edit') disabled @endcannot --}} id="input_{{ $key }}_companyphonestype"
                                            wire:model.defer="inputs.{{ $key }}.companyphonestype">

                                            <option value="">-- Select phone type --</option>

                                            <option value="mobile">mobile</option>
                                            <option value="work">work</option>
                                            <option value="landline">landline</option>
                                            <option value="primary">primary</option>
                                            <option value="secondary">secondary</option>
                                            <option value="other">other</option>

                                        </select>

                                    </div>
                                    @if ($key > 0)
                                        {{-- @canany(['accounts.create', 'accounts.edit']) --}}
                                        <div wire:click="openPhone"
                                            class="flex  text-red-600 text-sm w-full cursor-pointer">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p>Remove</p>
                                        </div>
                                        {{-- @endcanany --}}
                                    @endif
                                    @if ($modalPhone)
                                    <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-gray-200 rounded-lg shadow dark:bg-gray-700">
                                                <button wire:click="closeModal" type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                                        to delete?</h3>
                                                    <button wire:click="removeInput({{$key}}, {{$input['phoneId'] ?? 0}})" type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button wire:click="closeModal" type="button" 
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>    
                            @endforeach

                            {{-- @canany(['accounts.create', 'accounts.edit']) --}}
                            <button type="button" wire:click="addInput"
                                class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p class="ml-2">Add New Phone</p>
                            </button>
                            {{-- @endcanany --}}

                            <div class="col-span-6 sm:col-span-3 ">

                                <h2 class="mb-4 text-xl py-4 font-bold text-gray-900 dark:text-white">Emails</h2>
                            </div>

                            
                            @foreach ($companymail as $key => $input)
                                <div class="grid grid-cols-3  gap-2   items-center">
                                    <div class="w-full">
                                        <input {{-- @cannot('accounts.edit')  disabled @endcannot  --}} type="email"
                                            id="companymail_{{ $key }}_companyemails"
                                            wire:model.defer="companymail.{{ $key }}.companyemails"
                                            class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                            placeholder="enter company email" autocomplete="off" />

                                        @error('companymail.' . $key . '.companyemails')
                                            <span class="text-xs text-red-600">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="w-full">

                                        <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                            class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                                                shadow-sm focus:outline-none focus:ring-indigo-500
                                                 focus:border-indigo-500 sm:text-sm"
                                            id="companymail_{{ $key }}_companyemailstype"
                                            wire:model.defer="companymail.{{ $key }}.companyemailstype">
                                            <option value="">-- Select email type --</option>

                                            <option value="mobile">mobile</option>
                                            <option value="work">work</option>
                                            <option value="landline">landline</option>
                                            <option value="primary">primary</option>
                                            <option value="secondary">secondary</option>
                                            <option value="other">other</option>
                                        </select>

                                    </div>
                                    @if ($key > 0)
                                        {{-- @canany(['accounts.create', 'accounts.edit']) --}}
                                        <div wire:click="openEmail"
                                            class="flex  text-red-600 text-sm w-full cursor-pointer">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd"
                                                    d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <p>Remove</p>
                                        </div>
                                        {{-- @endcanany --}}
                                    @endif
                                    @if ($modalEmail)
                                    <div class="fixed inset-0 overflow-y-auto z-50 flex items-center justify-center">
                                        <div class="relative p-4 w-full max-w-md max-h-full">
                                            <div class="relative bg-gray-200 rounded-lg shadow dark:bg-gray-700">
                                                <button wire:click="closeModal" type="button"
                                                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                                        fill="none" viewBox="0 0 14 14">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                    </svg>
                                                    <span class="sr-only">Close modal</span>
                                                </button>
                                                <div class="p-4 md:p-5 text-center">
                                                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                                            stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                    </svg>
                                                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want
                                                        to delete?</h3>
                                                    <button wire:click="removeInputEmail({{$key}}, {{$input['emailId'] ?? 0}})" type="button"
                                                        class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                                        Yes, I'm sure
                                                    </button>
                                                    <button wire:click="closeModal" type="button" 
                                                        class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No,
                                                        cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                </div>
                            @endforeach

                            {{-- @canany(['accounts.create', 'accounts.edit']) --}}
                            <button type="button" wire:click="addInputEmail"
                                class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <p class="ml-2">Add New Email</p>
                            </button>
                            {{-- @endcanany --}}

                            <div class="col-span-6 sm:col-span-3 ">
                                <h2 class="mb-4 text-xl py-4 font-bold text-gray-900 dark:text-white">Location</h2>
                            </div>
                            <div class="grid grid-cols-3  gap-2">
                                <div class="w-full">
                                    <label for="houseno" class="block text-sm font-medium text-gray-700">House /
                                        No</label>

                                    <input type="text" wire:model="block" {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="enter house no" autocomplete="off" />

                                </div>
                                <div class="w-full">
                                    <label for="street"
                                        class="block text-sm font-medium text-gray-700">Street</label>

                                    <input type="text" {{-- @cannot('accounts.edit')  disabled @endcannot --}} wire:model="street"
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="enter street" 
                                        autocomplete="off">
                                </div>

                                <div class="w-full">
                                    <label for="address"
                                        class="block text-sm font-medium text-gray-700">Address</label>

                                    <input type="text" {{-- @cannot('accounts.edit')  disabled @endcannot --}} wire:model="address"
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="enter address" autocomplete="off" 
                                    />
                                </div>
                            </div>
                            <div class="grid grid-cols-3 py-3 gap-2">
                                <div class="w-full">
                                    <label for="country" class="block text-sm font-medium text-gray-700">Country /
                                        Region</label>

                                    <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        wire:model="country_id" wire:change="getCountryStates">
                                        @if (count($selectcountries) < 1)
                                            <option value="249">-- Select Country --</option>
                                        @else
                                            @foreach ($selectcountries as $selectcountry)
                                                <option value="{{ $selectcountry->id }}">{{ $selectcountry->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                        @foreach ($countries as $country)
                                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="w-full">
                                    <label for="state"
                                        class="block text-sm font-medium text-gray-700">State</label>

                                    <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-sm focus:outline-none
                                                 focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                                        wire:model="state_id" wire:change="getStateCities">

                                        @if (!empty($selectstates) < 1)
                                            <option value="4122">-- Select State --</option>
                                        @else
                                            @foreach ($selectstates as $selectstate)
                                                <option value="{{ $selectstate->id }}">{{ $selectstate->name }}
                                                </option>
                                            @endforeach

                                            @foreach ($selectcitysec as $selectcitysecc)
                                                <option value="{{ $selectcitysecc->id }}">{{ $selectcitysecc->name }}
                                                </option>
                                            @endforeach
                                        @endif
                                        @if (!empty($states))
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                                <div class="w-full">

                                    <label for="city" class="block text-sm font-medium text-gray-700">City</label>
                                    <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300
                                                 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                                  focus:border-indigo-500 sm:text-sm"
                                        wire:model="city_id">
                                        @if (!empty($selectcity) < 1)
                                            <option value="48357">-- Select City --</option>
                                        @else
                                            @foreach ($selectcity as $selectcitys)
                                                <option value="{{ $selectcitys->id }}">{{ $selectcitys->name }}
                                                </option>
                                            @endforeach
                                        @endif

                                        @if (!empty($cities))
                                            @foreach ($cities as $city)
                                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                </div>

                            </div>
                            <div class="w-full text-red-600">
                                @error('country_id')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="w-full text-red-600">
                                @error('state_id')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="grid grid-cols-3 py-3 gap-2">
                                <div class="w-full">

                                    <label for="zip" class="block text-sm font-medium text-gray-700">Zip
                                        Code</label>
                                    <input type="text" {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="enter zip" wire:model="zip" autocomplete="off">
                                </div>
                                <div class="w-full">
                                    <label for="time"
                                        class="block text-sm font-medium text-gray-700">Timezone</label>
                                    <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300
                                                 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                                  focus:border-indigo-500 sm:text-sm"
                                        wire:model="timezone">
                                        <option value="">-- select timezone --</option>
                                        <option value="EST">EST</option>
                                        <option value="CST">CST</option>
                                        <option value="PST">PST</option>
                                        <option value="MST">MST</option>
                                        <option value="AST">AST</option>
                                        <option value="HST">HST</option>
                                    </select>
                                </div>
                            </div>

                            <div class="grid grid-cols-3 py-3 gap-2">
                                <div class="w-full">

                                    <label for="assignby" class="block text-sm font-medium text-gray-700">Assign
                                        By</label>
                                    <input type="text" {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                        placeholder="-" wire:model="assign_by" autocomplete="off" readonly/>
                                </div>

                                <div class="w-full">
                                    <label for="users" class="block text-sm font-medium text-gray-700">Assign
                                        To</label>
                                    <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                        class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                                                      shadow-sm focus:outline-none focus:ring-indigo-500
                                                       focus:border-indigo-500 sm:text-sm"
                                        id="user_id" wire:model="user_id" wire:change="getgetUserId">
                                        @foreach ($selectuserslist as $key => $val)
                                            <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                        @endforeach
                                        <option value="">-- Select User --</option>
                                        @foreach ($userslist as $key => $val)
                                            <option value="{{ $val['id'] }}">{{ $val['name'] }}</option>
                                        @endforeach

                                    </select>

                                </div>

                                {{-- <input type="text"  class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                 placeholder="enter zip" wire:model="assign_to"  autocomplete="off"> --}}
                                {{-- <select class="mt-1 block w-full py-2 px-3 border border-gray-300
                                                 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                                  focus:border-indigo-500 sm:text-sm" wire:model="timezone">
                                                            <option value="">-- select timezone --</option>
                                                             <option value="EST">EST</option>
                                                             <option value="CST">CST</option>
                                                             <option value="PST">PST</option>
                                                             <option value="MST">MST</option>
                                                             <option value="AST">AST</option>
                                                             <option value="HST">HST</option>
                                                </select> --}}
                            </div>
                        </div>



                        <div class="col-span-6 sm:col-span-3 ">

                            <h2 class="mb-4 text-xl py-4 font-bold text-gray-900 dark:text-white">Details</h2>
                        </div>

                        <div class="grid grid-cols-3 py-3 gap-2">

                            <div class="w-full">

                                <label for="vendor_type"
                                    class="block text-sm font-medium text-gray-700">Vendor Type</label>
                                <select {{-- @cannot('accounts.edit')  disabled @endcannot --}}
                                    class="mt-1 block w-full py-2 px-3 border border-gray-300
                                                 bg-white rounded-md shadow-sm focus:outline-none focus:ring-indigo-500
                                                  focus:border-indigo-500 sm:text-sm"
                                    wire:model="vendor_type">
                                    <option value="0">-- Select Vendor Type --</option>
                                    <option value="Fixit">Fixit</option>
                                    <option value="Retail">Retail</option>
                                </select>
                            </div>

                            <div class="w-full">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700">Business Type
                                </label>
                                <input {{-- @cannot('accounts.edit')  disabled @endcannot --}} type="text"
                                    class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    placeholder="enter business_type" wire:model="business_type" autocomplete="off" />

                                                

                            </div>
                            <div class="w-full">
                                <label for="description"
                                    class="block text-sm font-medium text-gray-700">description</label>
                                <textarea {{-- @cannot('accounts.edit')  disabled @endcannot --}} type="text"
                                    class="mt-1 focus:ring-blue-500 focus:border-indigo-500
                                                block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    placeholder="enter description" wire:model="description" autocomplete="off">

                                                </textarea>

                            </div>

                        </div>

                        <div class="grid grid-cols-3 py-3 gap-2">

                            <div class="w-full text-red-600">
                                @error('business_type')
                                    <span class="error">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                    </div>
            </div>
            {{-- @canany(['accounts.create', 'accounts.edit']) --}}
            <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                <button type="submit"
                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Update
                </button>

            </div>
            {{-- @endcanany --}}
        </div>
        </form>
    </div>
    </div>
    </div>

</section>
