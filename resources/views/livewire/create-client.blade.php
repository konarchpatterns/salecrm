
<section class="yjGyQxv8jnYk9_MGMqLN zlFmyfujKXCLCPyPEOIS">
    <div class="mt-10 sm:mt-0">
        <div class="md:grid md:grid-cols-1 md:gap-6">
          <div class="mt-5 md:mt-0">
            <form wire:submit.prevent="save">
              <div class="shadow overflow-hidden sm:rounded-md">
                <div class="px-4 py-5  bg-white sm:p-6">
                    <h2 class="mb-4 text-xl font-bold text-gray-900 dark:text-white">
                        Create Client </h2>                                            
                    
                  <div class="grid grid-cols-2  gap-2 pt-5">
                    
                    <div class="w-full">
                      <label for="company" class="block text-sm font-medium text-gray-700">First Name</label>
                      <input type="text"  wire:model="fname"  autocomplete="name" class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                    </div>

                    <div class="w-full">
                        <label for="fax" class="block text-sm font-medium text-gray-700">Last Name</label>
                        <input type="text"  wire:model="lname" autocomplete="family-name" class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" >
                      </div>
                      <div class="w-full">
                        <label for="website" class="block text-sm font-medium text-gray-700">Designation</label>
                        <input type="text"   wire:model="designation" autocomplete="website" class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" required>
                      </div>
                      <div class="w-full relative">
                        <label for="black_list" class="block text-sm font-medium text-gray-700">Company Name</label>


                        <input type="search" wire:keydown="onClick" class="border rounded-lg w-full" placeholder="{{$value}}" value="{{$value}}" wire:model.debounce.300ms="query" required/>
                        {{-- <button type="button" class="pl-3" wire:click="onClick">
                          <svg class=" h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M137.4 374.6c12.5 12.5 32.8 12.5 45.3 0l128-128c9.2-9.2 11.9-22.9 6.9-34.9s-16.6-19.8-29.6-19.8L32 192c-12.9 0-24.6 7.8-29.6 19.8s-2.2 25.7 6.9 34.9l128 128z"/>
                          </svg>
                        </button> --}}
                        

                        <div class="{{$open ? '' : 'hidden'}} w-full absolute  h-48 py-2 overflow-y-auto text-gray-700 dark:text-gray-200 space-y-2">
                          @foreach ($companies as $company)
                            <div class="hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white"><button wire:click="onSelect({{$company->id}})" type="button" wire:click="onClick">{{$company->name}}</button></div> 
                            @endforeach         
                        </div>


                        {{-- <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                        shadow-sm focus:outline-none focus:ring-indigo-500
                         focus:border-indigo-500 sm:text-sm" wire:model="companyId" required>
                         <option value="">--- select company ---</option>
                         @foreach ($companies as $company)
                            <option value="{{$company->id}}">{{$company->name}}</option>
                         @endforeach
                      </select> --}}
                    </div>

                      <div class="w-full">
                        <label for="website" class="block text-sm font-medium text-gray-700">Linkdin url</label>
                        <input type="text"   wire:model="linkdin_url" autocomplete="website" class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                      </div>
                      
                  </div>
                  <div class="grid grid-cols-3  gap-2">
                    <div class="w-full text-red-600">
                        @error('fname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full text-red-600">
                        @error('lname') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full text-red-600">
                        @error('designation') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="w-full text-red-600">
                        @error('linkdin_url') <span class="error">{{ $message }}</span> @enderror
                    </div>
                </div>
                <div class="col-span-6 sm:col-span-3 ">

                    <h2 class="mb-4 text-xl py-4 font-bold text-gray-900 dark:text-white">Contacts</h2>
                  </div>
                            @foreach($inputs as $key => $input)
                            <div class="grid grid-cols-3  gap-2">
                             
                                <div class="w-full">
                                    <input type="text" id="input_{{$key}}_phone" wire:model.defer="inputs.{{$key}}.phone" class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="enter client phone" autocomplete="off">

                                    @error('inputs.'.$key.'.phone') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                                </div>
                                <div class="w-full">

                                    <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                                    shadow-sm focus:outline-none focus:ring-indigo-500
                                     focus:border-indigo-500 sm:text-sm" id="input_{{$key}}_phonetype" wire:model.defer="inputs.{{$key}}.phonetype" >

                                     <option value="">-- Select phone type --</option>
                                           <option value="mobile">mobile</option>
                                           <option value="landline">landline</option>
                                           <option value="primary">primary</option>
                                           <option value="secondary">secondary</option>

                                  </select>

                                </div>

                                @if($key > 0)
                                <div wire:click="removeInput({{$key
                                }})" class="flex  text-red-600 text-sm w-full cursor-pointer">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                    <p>Remove</p>
                                </div>
                                @endif
                            </div>
                            @endforeach

                            <button type="button" wire:click="addInput" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                                <p class="ml-2">Add New Phone</p>
                            </button>

                            <div class="col-span-6 sm:col-span-3 ">

                                <h2 class="mb-4 text-xl py-2 font-bold text-gray-900 dark:text-white">Emails</h2>
                              </div>
                                        @foreach($emailinputs as $key => $input)
                                        
                                        <div class="grid grid-cols-3  gap-2">
                                            <div class="w-full">
                                                <input type="email" id="emailinputs_{{$key}}_email" wire:model.defer="emailinputs.{{$key}}.email" class="mt-1 focus:ring-blue-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" placeholder="enter client email" autocomplete="off" >

                                                @error('companymail.'.$key.'.email') <span class="text-xs text-red-600">{{ $message }}</span> @enderror
                                            </div>
                                            <div class="w-full">

                                                <select class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md
                                                shadow-sm focus:outline-none focus:ring-indigo-500
                                                 focus:border-indigo-500 sm:text-sm" id="emailinputs_{{$key}}_emailtype" wire:model.defer="emailinputs.{{$key}}.emailtype" >
                                                  <option value="">-- Select email type --</option>

                                                       <option value="mobile">mobile</option>
                                                       <option value="landline">landline</option>
                                                       <option value="primary">primary</option>
                                                       <option value="secondary">secondary</option>

                                              </select>

                                            </div>

                                         
                                           
                                            @if($key > 0)
                                            <div wire:click="removeInputEmail({{$key}})" class="flex  text-red-600 text-sm w-full cursor-pointer">
                                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path></svg>
                                                <p>Remove</p>
                                            </div>
                                            @endif
                                        </div>
                                        @endforeach

                                        <button type="button" wire:click="addInputEmail" class="flex items-center justify-center text-blue-600 text-sm py-4 w-full cursor-pointer">
                                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-11a1 1 0 10-2 0v2H7a1 1 0 100 2h2v2a1 1 0 102 0v-2h2a1 1 0 100-2h-2V7z" clip-rule="evenodd"></path></svg>
                                            <p class="ml-2">Add New Email</p>
                                        </button>


                                     
                          
                                        </div>
                                   
                                  

                                        
                  </div>
                </div>
                <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                  <button  type="submit" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-blue-700 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                    Save
                  </button>

                </div>
              </div>
            </form>
          </div>
        </div>
      </div>

  </section>
