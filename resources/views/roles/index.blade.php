<x-app-layout>

    <x-content-layout title='Roles' subtitle="Manage your role here." button='Add new role' link="roles.create">
        <div class="relative overflow-x-auto border">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Id
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Role name
                        </th>
                        <th scope="col" class="px-6 py-3 text-right">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($roles as $key => $role)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $role->id }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $role->name }}
                            </td>
                            <td class="px-6 py-4 text-right">
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="{{ $role->id }}"
                                    class="bg-transparent text-gray-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center"
                                    type="button">
                                    <x-lucide-more-vertical class="h-5 w-5" />
                                </button>
                                <div id="{{ $role->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">
                                        <li>
                                            <a href="{{ route('roles.show', $role->id) }}" class="block px-4 py-2 hover:bg-gray-100">View</a>
                                        </li>
                                        <li>
                                            <a href="{{ route('roles.edit', $role->id) }}" class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                        </li>
                                        <li>
                                            {!! Form::open(['method' => 'DELETE', 'route' => ['roles.destroy', $role->id], 'style' => 'display:inline']) !!}
                                            {!! Form::submit('Delete', [ 'class' => 'block px-4 py-2 hover:bg-gray-100' ]) !!}
                                            {!! Form::close() !!}
                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-content-layout>
</x-app-layout>
