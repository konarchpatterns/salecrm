<x-app-layout>
    <x-content-layout title='Users' subtitle="Edit User." button='Go back' link="users.index">

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
        <form method="post" action="{{ route('users.update', $user->id) }}">
            @method('patch')
            @csrf
            <div class="flex flex-col gap-3">
                <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        User Name
                    </label>
                    <input type="text" value="{{ $user->name }}" name="name" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Users name" required />
                </div>


                <div>
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email
                    </label>
                    <input type="email" value="{{ $user->email }}" name="email" id="email"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Users Email" required />
                </div>



                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Role
                    </label>

                    @foreach($roles as $role)

                    <input type="checkbox"
                    name="role[]"
                    value="{{ $role->name }}"
                    {{ in_array($role->name, $userRole)
                        ? 'checked'
                        : '' }}
                    class="permission w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
                    {{ $role->name }}
                    @endforeach

                    {{-- <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                     focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                     dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="role[]" required multiple>
                    <option value="">Select role</option>
                    @foreach($roles as $role)
                        <option value="{{ $role->name }}"
                            {{ in_array($role->name, $userRole)
                                ? 'selected'
                                : '' }}>{{ $role->name }}</option>
                    @endforeach
                </select> --}}
                </div>


                <div>
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Reporting Manager
                        @php
                        $designationlistss=json_decode($designationlist,true);
                        @endphp
                    </label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                     focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                     dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="designation" >
                    <option value="0">Assign Manager</option>
                    @foreach($designationlistss as $key=>$val)
                        <option value="{{ $designationlistss[$key]['id'] }}"
                         @if($designationlistss[$key]['id']==$user->assign_by)
                               selected
                               @endif>
                                {{ $designationlistss[$key]['name'] }}</option>
                    @endforeach
                </select>
                </div>
                {{-- <div>
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password
                    </label>
                    <input type="password" value="{{ old('password') }}" name="password" id="password"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 px-5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Users Email" required />
                </div> --}}

                {{-- <div>
                    <label for="Permissions" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Permissions
                    </label>
                </div>
                @foreach ($groupArr as $key => $val)
                        @if (count(json_decode($groupArr[$key][0]['data'], true)) > 0)


                    <label for="grpermission" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                       {{ $key }}
                    </label>
                    <select class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500
                     focus:border-blue-500 block w-1/3 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400
                     dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    name="grpermission[]" required multiple>
                    <option value="">Select permission</option>
                    @if (count(json_decode($groupArr[$key][0]['data'], true)) > 0)
                    @foreach (json_decode($groupArr[$key][0]['data'], true) as $permission)
                        <option value="{{ $permission['name'] }}" {{ in_array($permission['name'], $userPermission)
                                ? 'selected'
                                : '' }}>{{ $permission['name'] }}</option>
                    @endforeach
                    @endif
                </select>

                @endif
                @endforeach --}}



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
                                                        name="grpermission[{{ $permission['name'] }}]"
                                                        value="{{ $permission['name'] }}"
                                                        {{ in_array($permission['name'], $userPermission) ? 'checked' : '' }}
                                                        {{ in_array($permission['name'], $permissionNamesecs) ? 'checked disabled' : '' }}
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




                <div class="mt-3 text-right">
                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Update User
                    </button>
                </div>
            </div>







        </form>

    </div>
</x-content-layout>
</x-app-layout>



{{--

@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h1>Update user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $user->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ $user->username }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control"
                        name="role" required>
                        <option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $userRole)
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection --}}
