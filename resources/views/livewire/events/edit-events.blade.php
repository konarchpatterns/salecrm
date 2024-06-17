<div>
<form wire:submit.prevent="update">
    <div class="mb-5 w-1/4">
      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Title</label>
      <input wire:model="title" type="text" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required />
    </div>
    <div class="mb-5 w-1/2">  
        <label for="message" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
        <textarea wire:model="description" id="message" rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"></textarea>
    </div>
    <div class="mb-5 w-1/4">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Priority</label>
        <select wire:model="priority" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
          <option value="high">High</option>
          <option value="medium">Madium</option>
          <option value="low">Low</option>
        </select>
    </div>
    <div class="mb-5 w-1/4">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Start Date</label> 
        <input type="datetime-local" wire:model="start_date" class="border rounded-md"/>
    </div>
    {{-- <div class="mb-5 w-1/4">
        <label for="countries" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select Company</label>
        <select wire:model="company_id" id="countries" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            @foreach ($companies as $company)
                <option value="{{$company->id}}">{{$company->name}}</option>
            @endforeach
        </select>
    </div> --}}
    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Update</button>
  </form>
</div>
