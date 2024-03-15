
<x-app-layout>
    <x-content-layout title='Edit Permissions' subtitle="Edit permission here." button='Go back' link="permissions.index">
        <div class="space-y-3">
            @if ($errors->has('name'))
                {{-- <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>

                            <li>{{ $errors->first('name') }}</li>

                    </ul>
                </div> --}}
                {{toastr()->addDanger('Whoops!</strong> There were some problems with your input')}}

                {{toastr()->addDanger($errors->first('name'))}}

            @endif
            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @method('patch')
                @csrf
                <div class="flex flex-col gap-3">
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Permission name
                        </label>
                        <input type="text" value="{{ $permission->name }}" name="name" id="name"
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



{{--
    <div class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">


        <h5 class="mb-2 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Editing permission
        </h5>


        <p class="mb-3 font-normal text-gray-500 dark:text-gray-400">&nbsp;</p>

            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @method('patch')
                            @csrf
                <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Permission name</label>
                <input type="text" value="{{ $permission->name }}" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="permission name" required />
                </div>

                </div>
                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
            @endif
                <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Save Permission</button>
                <a href="{{ route('permissions.index') }}" class="text-white bg-red-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-1/3 sm:w-auto px-5 py-2.5 text-center dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-800">Back</a>
            </form>

</div> --}}





{{--
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                <div class="bg-light p-4 rounded">
                    <h2>Edit permission</h2>
                    <div class="lead">
                        Editing permission.
                    </div>

                    <div class="container mt-4">

                        <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                            @method('patch')
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input value="{{ $permission->name }}"
                                    type="text"
                                    class="form-control"
                                    name="name"
                                    placeholder="Name" required>

                                @if ($errors->has('name'))
                                    <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                                @endif
                            </div>

                            <button type="submit" class="btn btn-primary">Save permission</button>
                            <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
                        </form>
                    </div>

                </div>

                </div>


                </div>


            </div>
        </div>
    </div> --}}


</x-app-layout>



{{--

@extends('layouts.app-master')

@section('content')
    <div class="bg-light p-4 rounded">
        <h2>Edit permission</h2>
        <div class="lead">
            Editing permission.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('permissions.update', $permission->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $permission->name }}"
                        type="text"
                        class="form-control"
                        name="name"
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save permission</button>
                <a href="{{ route('permissions.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection --}}
