<x-app-layout>


    <x-content-layout title='Edit Roles' subtitle="Edit Roles here." button='Go back' link="roles.index">
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


            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('patch')
                @csrf
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Role name
                        </label>
                        <input type="text" value="{{ $role->name }}" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="role name" required />
                    </div>
                    <div class="mt-3 text-right">
                        <button type="submit"
                            class="text-white bg-blue-700 mt-2 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                            Save Role
                        </button>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6 mt-6">
                    @foreach ($groupArr as $key => $val)
                        @if (count(json_decode($groupArr[$key][0]['data'], true)) > 0)
                            <table class="text-sm text-left text-gray-500 max-h-96 overflow-hidden">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th colspan="3" scope="col" class="px-6 py-3">Group - {{ $key }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <input name="all_permission" id="all_permission" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                            <label for="checkbox-all-search" class="sr-only"></label>
                                        </th>
                                        <th scope="col" class="px-6 py-3">
                                            Permission name
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-right">
                                            Guard
                                        </th>
                                    </tr>

                                </thead>
                                <tbody class="overflow-y-scroll">
                                    @if (count(json_decode($groupArr[$key][0]['data'], true)) > 0)
                                        @foreach (json_decode($groupArr[$key][0]['data'], true) as $permission)
                                            <tr
                                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                                <th scope="row"
                                                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                    <input type="checkbox" id="{{ $permission['name'] }}"
                                                        name="permission[{{ $permission['name'] }}]"
                                                        value="{{ $permission['name'] }}"
                                                        {{ in_array($permission['name'], $rolePermissions) ? 'checked' : '' }}
                                                        class="permission w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                                                    <label for="permission[{{ $permission['name'] }}]" class="sr-only"
                                                        checked>checkbox</label>
                                                </th>
                                                <td class="px-6 py-4">
                                                    {{ $permission['name'] }}
                                                </td>
                                                <td class="px-6 py-4 text-right">
                                                    {{ $permission['guard_name'] }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                </tbody>
                            </table>
                        @endif

                    @endforeach
                </div>
            </form>

        </div>








    </x-content-layout>


    {{--
            <form method="POST" action="{{ route('roles.update', $role->id) }}">

    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Editing Role
        </h5>


        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">&nbsp;</p>
                @method('patch')
                            @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Role name</label>
                <input type="text" value="{{ $role->name }}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="role name" required />
                </div>

                </div>
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Roles</button>
                <a href="{{ route('roles.index') }}" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</a>



            </div>




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


            <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Assigned Permissions.
            </h5>


            <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
            <th scope="col" class="p-4">
                <div class="flex items-center">
                    <input name="all_permission" id="all_permission"  type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
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
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="w-4 p-4">
                <div class="flex items-center">
                    <input type="checkbox"
                    id="{{ $permission->name }}"
                    name="permission[{{ $permission->name }}]"
                    value="{{ $permission->name }}"
                    {{ in_array($permission->name, $rolePermissions)
                        ? 'checked'
                        : '' }}
                    class="permission w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                     <label for="permission[{{ $permission->name }}]" class="sr-only"   checked>checkbox</label>
                </div>
            </td>
            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
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

        </form> --}}

    @section('scripts')
        @push('other-scripts')
            <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
            <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
            <script type="text/javascript">
                $(document).ready(function() {
                    $('[name="all_permission"]').on('click', function() {

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
