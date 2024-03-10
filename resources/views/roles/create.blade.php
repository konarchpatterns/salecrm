<x-app-layout>
    <x-content-layout title='Roles' subtitle="Create new role here." button='Go back' link="roles.index">
        <div class="space-y-3">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="POST" action="{{ route('roles.store') }}">
                @csrf
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Add new role
                        </label>
                        <input type="text" value="{{ old('name') }}" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="role name" required />
                    </div>
                    <div class="mt-3 text-right">
                        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save Role
                        </button>
                    </div>
                </div>
            </form>
            <div class="grid grid-cols-2">
            <table class="w-full text-sm text-left text-gray-500 mt-3">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input name="all_permission" id="all_permission" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only"></label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Permission name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Guard
                        </th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                        <tr
                            class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input type="checkbox" id="{{ $permission->name }}"
                                        name="permission[{{ $permission->name }}]" value="{{ $permission->name }}"
                                        class="permission w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="permission[{{ $permission->name }}]" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <th scope="row"
                                class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <label for="{{ $permission->name }}">{{ $permission->name }}</label>
                            </th>
                            <td class="px-6 py-4">
                                {{ $permission->guard_name }}
                            </td>

                        </tr>
                    @endforeach

                </tbody>
            </table>
            </div>
        </div>

    </x-content-layout>

    @section('scripts')
        @push('other-scripts')
            <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
            <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
            <script>
                $(document).ready(function() {
                    $('[id="all_permission"]').on('click', function() {

                        if ($(this).is(':checked')) {
                            $.each($('.permission'), function() {
                                $(this).prop('checked', true);
                            });
                        } else {
                            $.each($('.permission'), function() {
                                $(this).prop('checked', false);
                            });
                        }

                    });
                });
            </script>
        @endpush
    @endsection
</x-app-layout>
