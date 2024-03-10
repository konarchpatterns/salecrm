
<x-app-layout>


    <x-content-layout title='Permissions' subtitle="Create new permission here." button='Go back' link="permissions.index">
        <div class="space-y-3">
            @if ($errors->has('name'))
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>

                            <li>{{ $errors->first('name') }}</li>

                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Add new permission
                        </label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="permission name" required />
                    </div>
                    <div class="mt-3 text-right">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save Permission
                        </button>
                    </div>
                </div>
            </form>

        </div>

    </x-content-layout>



</x-app-layout>

