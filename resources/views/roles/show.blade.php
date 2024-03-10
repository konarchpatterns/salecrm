
<x-app-layout>

    <x-content-layout title='Role {{ ucfirst($role->name) }}'  subtitle="View Permission." button='Go Back' link="roles.index">
        {{-- <div class="relative overflow-x-auto border">
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
                    @foreach($rolePermissions as $permission)
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
        </div> --}}



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



    </x-content-layout>

{{--
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="#">
            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Role</h5>
        </a>
        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{ ucfirst($role->name) }}</p>

    </div>

 <p>&nbsp;</p>


    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <a href="#" class="inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Permissions

        </a>
        <p>&nbsp;</p>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>

        <th scope="col" class="px-6 py-3">
            Name
        </th>
        <th scope="col" class="px-6 py-3">
            Guard
        </th>

        </tr>
        </thead>
        <tbody>
        @foreach($rolePermissions as $permission)
        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
            {{ $permission->name }}
        </th>
        <td class="px-6 py-4">
            {{ $permission->guard_name }}
        </td>

        </tr>
        @endforeach

        </tbody>
        </table>
        </div> --}}


{{--
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">



                    <div class="bg-light p-4 rounded">
                        <h1>{{ ucfirst($role->name) }} Role</h1>
                        <div class="lead">

                        </div>

                        <div class="container mt-4">

                            <h3>Assigned permissions</h3>

                            <table class="table table-striped">
                                <thead>
                                    <th scope="col" width="20%">Name</th>
                                    <th scope="col" width="1%">Guard</th>
                                </thead>

                                @foreach($rolePermissions as $permission)
                                    <tr>
                                        <td>{{ $permission->name }}</td>
                                        <td>{{ $permission->guard_name }}</td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                    </div>
                    <div class="mt-4">
                        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
                        <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
                    </div>

                </div>


            </div>
        </div> --}}
    </div>
</x-app-layout>




{{-- @extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>{{ ucfirst($role->name) }} Role</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">

            <h3>Assigned permissions</h3>

            <table class="table table-striped">
                <thead>
                    <th scope="col" width="20%">Name</th>
                    <th scope="col" width="1%">Guard</th>
                </thead>

                @foreach($rolePermissions as $permission)
                    <tr>
                        <td>{{ $permission->name }}</td>
                        <td>{{ $permission->guard_name }}</td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>
    <div class="mt-4">
        <a href="{{ route('roles.edit', $role->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('roles.index') }}" class="btn btn-default">Back</a>
    </div>
@endsection --}}
