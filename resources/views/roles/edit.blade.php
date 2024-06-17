<x-app-layout>
    @include('datatablecss')

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
                @php
                $ii=0;
                @endphp
                <!--/container-->
                <!-- jQuery -->
                <script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
                
                <!--Datatables -->
                <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
                <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>

                <div class="grid grid-cols-2 gap-6 mt-6">

                    @foreach ($groupArr as $key => $val)
                        @if (count(json_decode($groupArr[$key][0]['data'], true)) > 0)

<div id='recipients' class="p-8 mt-6 lg:mt-0 rounded shadow bg-white max-h-24'">

                            {{-- <table class="text-sm text-left text-gray-500 max-h-96 overflow-hidden"> --}}
                                <table id="example{{ $ii }}" class="stripe hover" style="width:100%; padding-top: 1em;
                                padding-bottom: 1em; ">

                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr>
                                        <th colspan="3" scope="col" class="px-6 py-3">Group - {{ $key }}</th>
                                    </tr>
                                    <tr>
                                        <th scope="col" class="px-6 py-3">
                                            <input name="all_permission{{ $ii }}" id="all_permission{{ $ii }}" type="checkbox"
                                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500
                                                 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2
                                                  dark:bg-gray-700 dark:border-gray-600">
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
                                <tbody>

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
                                                        class="permission{{ $ii }} w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600">
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
</div>






                        @endif




@section('scripts')
@push('other-scripts')
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(document).ready(function() {

        var table = $('#example@php echo $ii; @endphp').DataTable({
                responsive: true,
                bPaginate: false,
                scrollCollapse: true,
    scrollY: '50vh'
            })
            .columns.adjust()
            .responsive.recalc();
    });
</script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('[name="all_permission@php echo $ii; @endphp"]').on('click', function() {

                if ($(this).is(':checked')) {
                    $.each($('.permission@php echo $ii; @endphp'), function() {
                        $(this).prop('checked', true);
                    });
                } else {
                    $.each($('.permission@php echo $ii; @endphp'), function() {
                        $(this).prop('checked', false);
                    });
                }

            });
        });
    </script>
@endpush
@endsection
@php
    $ii++ ;
@endphp
                    @endforeach
                </div>
            </form>

        </div>









    </x-content-layout>



</x-app-layout>
