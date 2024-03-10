
<x-app-layout>

    <x-content-layout title='Group {{ ucfirst($group->name) }}'  subtitle="View Permission." button='Go Back' link="groups.index">
        <div class="relative overflow-x-auto border">
            <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Permissions
                        </th>

                        <th scope="col" class="px-6 py-3 ">
                            Guard
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($groupPermissions as $permission)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-3 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $permission->name }}
                            </th>
                            <td class="px-6 py-3">
                                {{ $permission->guard_name }}
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </x-content-layout>

    </div>
</x-app-layout>


