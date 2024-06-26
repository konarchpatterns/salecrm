<x-app-layout>

    <x-content-layout title='Permissions' secondaryButton="Add Group" subtitle="Manage your permission here."
        button='Add new permission' link="permissions.create">
        @include('datatablecss')

        <!--Card-->
        <div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white">


            <table id="example" class="stripe hover" style="width:100%; padding-top: 1em;  padding-bottom: 1em;">
                <thead>
                    <tr>
                        <th data-priority="1">Name</th>
                        <th data-priority="2">Guard</th>
                        <th data-priority="3">Action</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($permissions as $permission)
                        <tr>
                            <td> {{ $permission->name }}</td>
                            <td> {{ $permission->guard_name }}</td>

                            <td>
                                <button id="dropdownMenuIconButton" data-dropdown-toggle="{{ $permission->id }}"
                                    class="bg-transparent text-gray-700 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-200 font-medium rounded-lg text-sm p-1 text-center inline-flex items-center"
                                    type="button">
                                    <x-lucide-more-vertical class="h-5 w-5" />
                                </button>
                                <div id="{{ $permission->id }}"
                                    class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
                                    <ul class="py-2 text-sm text-gray-700" aria-labelledby="dropdownMenuIconButton">

                                        <li>
                                            <a href="{{ route('permissions.edit', $permission->id) }}"
                                                class="block px-4 py-2 hover:bg-gray-100">Edit</a>
                                        </li>
                                        <li>
                                            {{-- {!! Form::open(['method' => 'DELETE', 'route' => ['permissions.destroy', $permission->id], 'style' => 'display:inline']) !!}
                                {!! Form::submit('Delete', [ 'class' => 'block px-4 py-2 hover:bg-gray-100' ]) !!}
                                {!! Form::close() !!} --}}

                                            <form method="POST"
                                                action="{{ route('permissions.destroy', $permission->id) }}"
                                                style="display:inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                    class="block px-4 py-2 hover:bg-gray-100">Delete</button>
                                            </form>

                                        </li>
                                    </ul>
                                </div>
                            </td>
                        </tr>
                    @endforeach

                    <!-- Rest of your data (refer to https://datatables.net/examples/server_side/ for server side processing)-->


                </tbody>

            </table>


        </div>
        <!--/Card-->



        <!-- Main modal -->
        <div id="default-modal" tabindex="-1" aria-hidden="true"
            class="hidden overflow-y-auto overflow-x-hidden
fixed top-0 right-0 left-0 z-50 justify-center items-center w-full
md:inset-0 h-[calc(100%-1rem)] max-h-full">
            <div class="relative p-4 w-full max-w-2xl max-h-full">
                <!-- Modal content -->
                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                    <!-- Modal header -->
                    <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                        <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                            Add Group
                        </h3>
                        <button type="button"
                            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                            data-modal-hide="default-modal">
                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                viewBox="0 0 14 14">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                            </svg>
                            <span class="sr-only">Close modal</span>
                        </button>
                    </div>
                    <!-- Modal body -->
                    <div class="p-4 md:p-5 space-y-4">
                        {{-- <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    Enter Group Name
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <input type="text" id="groupname" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-20px p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="enter a group name" required />

                </p> --}}
                        @livewire('creategroup')

                    </div>

                </div>
            </div>
        </div>


        <!--/container-->
        <!-- jQuery -->
        <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

        <!--Datatables -->
        <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
        <script>
            $(document).ready(function() {

                var table = $('#example').DataTable({
                        responsive: true
                    })
                    .columns.adjust()
                    .responsive.recalc();
            });
        </script>
    </x-content-layout>



</x-app-layout>
