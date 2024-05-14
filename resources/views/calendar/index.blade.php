<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <title>Calendar</title>
    <script src="https://cdn.tailwindcss.com"></script>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <style>
    .offset-1 {
    margin-left: auto;
    margin-right: auto;
    }
    /* .h-10, .me-2{
        height: 30px;
        margin-inline-end: 8px;
    } */
    .navbar {
    padding-bottom: 0px;
    }
    .userImg{
        width: 32px;
        height: 32px;
        border-radius: 9999px;
    }
    .space-y-7{
        margin-top: 20px;
        margin-bottom: 20px;
    }
    .space-r-2{
        margin-right: 8px;
    }
    .space-l-2{
        margin-left: 8px;
    }
    #bookingModal{
        margin: auto;
    }
  </style>

</head>
<body>
        {{-- <div class="sticky-top z-10 bg-white">
            <nav class=" flex justify-between px-2 pt-2 ">
                <div class="">
                    <a href="/salecrm/dashboard" class="flex  ml-2">
                        <img src={{asset('logo.png')}} class="h-8  me-2" alt="FlowBite Logo" />
                    </a>
                </div>

                <div class="dropdown">
                    <button class="btn "type="button" data-bs-toggle="dropdown"aria-expanded="false">
                        <img class="userImg" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}">
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">

                      <div class="p-4" role="none">
                        <p class="text-muted small" role="none">
                            <?php echo Auth::user()->name; ?>
                        </p>
                        <p class="font-weight-bold text-dark" role="none">
                            <?php echo Auth::user()->email; ?>
                        </p>
                      </div>
                      <li><a class="dropdown-item" href="/dashboard">Dashboard</a></li>
                      <li><a class="dropdown-item" href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">Profile<a></li>
                      <li>
                        <form method="POST" action="{{ route('logout') }}" x-data>
                            @csrf
                            <x-dropdown-link class="dropdown-item" role="menuitem" href="{{ route('logout') }}"
                                     @click.prevent="$root.submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                      </li>
                    </ul>
                </div>
            </nav>
            <hr />
        </div> --}}

  <!-- Modal -->
    <div class="modal fade " id="bookingModal" tabindex="-1"     aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Booking title</h5>
                      <button type="button" class="btn-close" id="cancelBtn1"     data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                    <div class="modal-body ">
                        <div class="space-y-7">
                            <label class="w-100">Title:
                                <input type="text" class="form-control" id="title">
                                <span id="titleError" class="text-danger"></span>
                            </label>
                        </div>
                        <div class="space-y-7 d-flex ">
                            <label class="w-50 space-r-2">Start Time:
                                <input type="time" class="form-control"id="start_time">
                                <span id="startTimeError"class="text-danger"></span>
                            </label>
                            <label class="w-50 space-l-2">End Time:
                                <input type="time" class="form-control"id="end_time">
                                <span id="endTimeError"class="text-danger"></span>
                            </label>
                        </div>
                        <div class="space-y-7 ">
                            <label class="w-100 space-r-2">Discription:
                                <textarea type="textarea" class="form-control"id="discription" ></textarea>
                                <span id="discriptionError"class="text-danger"></span>
                            </label>
                        </div>
                        <div class="space-y-7 ">
                            <label class="w-100 space-r-2">Priority:
                                <select type="textarea" class="form-control " id="priority" >
                                    <option value="">-</option>
                                    <option value="high">High</option>
                                    <option value="medium">Medium</option>
                                    <option value="low">Low</option>
                                </select>
                                <span id="priorityError"class="text-danger"></span>
                            </label>
                        </div>
                        <div class="space-y-7 d-flex ">
                            <label class="w-50 space-r-2">Created by:
                                <input type="text" disabled class="form-control" id="created_by" value="{{ Auth::user()->name }}">
                                <span id="creatError" class="text-danger"></span>
                            </label>
                            <label class="w-50 space-l-2">Updated by:
                                <input type="text" disabled class="form-control" id="updated_by" value="{{ Auth::user()->name }}">
                                <span id="updateError" class="text-danger"></span>
                            </label>
                        </div>



                    </div>
                    <div class="modal-footer">
                        <button type="button" id="cancelBtn" class="btn         btn-secondary"      data-bs-dismiss="modal">Close</button>
                        <button type="button" id="saveBtn" class="btn       btn-primary">Save     changes</button>
                    </div>
                </div>
            </div>
    </div>



    <div class="modal fade " id="viewModal" tabindex="-1"     aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Event Detail</h5>
                    <button type="button" class="btn-close" id="cancelBtn1"     data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <div class="card">
                        {{-- <div class="card-header">
                          Event
                        </div> --}}
                        <div class="card-body">
                            <p id="destroy" class="hidden"></p>
                          <h5 id="event-name" class="card-title">Event Name</h5>
                          <p id="event-dis" class="card-text">Event discription</p>

                          <p  class="card-text">
                            <b>Start time: </b>
                            <span id="start-time"></span>
                          </p>

                          <p  class="card-text">
                            <b>End time: </b>
                            <span id="end-time"></span>
                          </p>
                          <p  class="card-text">
                            <b >Priority: </b>
                            <span id="event-priority"></span>
                          </p>
                          <p  class="card-text">
                            <b >Created by-: </b>
                            <span id="created_by1"></span>
                          </p>
                          <p  class="card-text">
                            <b >Updated by-: </b>
                            <span id="updated_by1"></span>
                          </p>
                        </div>
                      </div>
                </div>
                <div class="modal-footer">
                    <button type="button" id="cancelBtn" class="btn         btn-secondary"      data-bs-dismiss="modal">Close</button>
                    <button type="button" id="deleteBtn" class="btn       btn-primary">Delete Event</button>
                </div>
              </div>
          </div>
  </div>


    <div class="flex ">
        <!-- This example requires Tailwind CSS v2.0+ -->
{{-- <div class="flex flex-col fixed  left-0  w-52 border-r border-gray-200 bg-white pb-3">

    <div class="mt-3 flex flex-grow flex-col">
      <nav class="flex-1 space-y-8 bg-white px-2" aria-label="Sidebar">
        <div class="space-y-1">
          <!-- Current: "bg-gray-100 text-gray-900", Default: "text-gray-600 hover:bg-gray-50 hover:text-gray-900" -->
          <a href="#" class="bg-gray-100 text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!--
              Heroicon name: outline/home

              Current: "text-gray-500", Default: "text-gray-400 group-hover:text-gray-500"
            -->
            <svg class="text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12l8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
            </svg>
            Dashboard
          </a>

          <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/users -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z" />
            </svg>
            Team
          </a>

          <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/folder -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 12.75V12A2.25 2.25 0 014.5 9.75h15A2.25 2.25 0 0121.75 12v.75m-8.69-6.44l-2.12-2.12a1.5 1.5 0 00-1.061-.44H4.5A2.25 2.25 0 002.25 6v12a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18V9a2.25 2.25 0 00-2.25-2.25h-5.379a1.5 1.5 0 01-1.06-.44z" />
            </svg>
            Projects
          </a>

          <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/calendar -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5" />
            </svg>
            Calendar
          </a>

          <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/inbox -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 13.5h3.86a2.25 2.25 0 012.012 1.244l.256.512a2.25 2.25 0 002.013 1.244h3.218a2.25 2.25 0 002.013-1.244l.256-.512a2.25 2.25 0 012.013-1.244h3.859m-19.5.338V18a2.25 2.25 0 002.25 2.25h15A2.25 2.25 0 0021.75 18v-4.162c0-.224-.034-.447-.1-.661L19.24 5.338a2.25 2.25 0 00-2.15-1.588H6.911a2.25 2.25 0 00-2.15 1.588L2.35 13.177a2.25 2.25 0 00-.1.661z" />
            </svg>
            Documents
          </a>

          <a href="#" class="text-gray-600 hover:bg-gray-50 hover:text-gray-900 group flex items-center px-2 py-2 text-sm font-medium rounded-md">
            <!-- Heroicon name: outline/chart-bar -->
            <svg class="text-gray-400 group-hover:text-gray-500 mr-3 flex-shrink-0 h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
              <path stroke-linecap="round" stroke-linejoin="round" d="M3 13.125C3 12.504 3.504 12 4.125 12h2.25c.621 0 1.125.504 1.125 1.125v6.75C7.5 20.496 6.996 21 6.375 21h-2.25A1.125 1.125 0 013 19.875v-6.75zM9.75 8.625c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125v11.25c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V8.625zM16.5 4.125c0-.621.504-1.125 1.125-1.125h2.25C20.496 3 21 3.504 21 4.125v15.75c0 .621-.504 1.125-1.125 1.125h-2.25a1.125 1.125 0 01-1.125-1.125V4.125z" />
            </svg>
            Reports
          </a>
        </div>
        <div class="space-y-1">
          <h3 class="px-3 text-sm font-medium text-gray-500" id="projects-headline">Projects</h3>
          <div class="space-y-1" role="group" aria-labelledby="projects-headline">
            <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
              <span class="truncate">Website redesign</span>
            </a>

            <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
              <span class="truncate">GraphQL API</span>
            </a>

            <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
              <span class="truncate">Customer migration guides</span>
            </a>

            <a href="#" class="group flex items-center rounded-md px-3 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 hover:text-gray-900">
              <span class="truncate">Profit sharing program</span>
            </a>
          </div>
        </div>
      </nav>
    </div>
</div> --}}

        <div class="overflow-y-auto  overflow-x-hidden" id="test">
            <div class="row">
                <div class="col-12">
                    <div class="col-md-11 offset-1 mt-5 mb-5">
                        <div id="calendar">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var booking = @json($events);
            $('#cancelBtn').click(function(){
                $('#title').val('');
                $('#start_time').val('');
                $('#end_time').val('');
            });
            $('#cancelBtn1').click(function(){
                $('#title').val('');
                $('#start_time').val('');
                $('#end_time').val('');
            });

            $('#calendar').fullCalendar({
                header: {
                    left: 'prev, next today',
                    center: 'title',
                    right: 'month, agendaWeek, agendaDay',
                },
                events: booking,
                selectable: true,
                selectHelper: true,
                select: function(start, end, allDays) {

                    $('#bookingModal').modal('toggle');

                    $('#saveBtn').click(function() {
                        var title = $('#title').val();
                        var start_date = moment(start).format('YYYY-MM-DD');
                        var end_date = moment(end).format('YYYY-MM-DD');
                        var start_time = $('#start_time').val();
                        var end_time = $('#end_time').val();
                        var discription = $('#discription').val();
                        var priority = $('#priority').val();
                        var created_by = $('#created_by').val();
                        var updated_by = $('#updated_by').val();

                        $.ajax({
                            url:"{{ route('calendar.store') }}",
                            type:"POST",
                            dataType:'json',
                            data:{ title, start_date, end_date,start_time, end_time,discription, priority, created_by, updated_by },
                            success:function(response)
                            {
                                $('#bookingModal').modal('hide')
                                $('#calendar').fullCalendar('renderEvent', {
                                    'id': response.id,
                                    'title': response.title,
                                    'start' : response.start,
                                    'end'  : response.end,
                                    'color' : response.color,
                                    'discription' : response.discription,
                                    'priority' : response.priority,
                                    'created_by': response.created_by,
                                    'updated_by': response.updated_by
                                });
                                $('#title').val('');
                                $('#start_time').val('');
                                $('#end_time').val('');
                                $('#discription').val('');
                                $('#priority').val('');

                            },
                            error:function(error)
                            {
                                if(error.responseJSON.errors) {
                                    $('#titleError').html(error.responseJSON.errors.title);
                                    $('#startTimeError').html(error.responseJSON.errors.start_time);
                                    $('#endTimeError').html(error.responseJSON.errors.end_time);
                                    $('#discriptionError').html(error.responseJSON.errors.discription);
                                    $('#priorityError').html(error.responseJSON.errors.priority);
                                }
                            },
                        });
                    });
                },
                editable: true,
                eventDrop: function(event) {
                    var id = event.id;
                    var start_date = moment(event.start).format('YYYY-MM-DD');
                    var end_date = moment(event.end).format('YYYY-MM-DD');
                    var updated_by = $('#updated_by').val();

                    $.ajax({
                            url:"{{ route('calendar.update', '') }}" +'/'+ id,
                            type:"PATCH",
                            dataType:'json',
                            data:{ start_date, end_date, updated_by },
                            success:function(response)
                            {
                                swal("Good job!", "Event Updated!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                },
                eventClick: function(event){

                    var id = event.id;
                    $.ajax({
                        url:"{{ route('calendar.show', '') }}" +'/'+ id,
                        method: 'GET',
                        success: function(response){
                            console.log(response);
                            $('#viewModal').modal('toggle');
                            $('#destroy').text(response.id);
                            $('#event-name').text(response.title);
                            $('#event-dis').text(response.discription);
                            $('#start-time').text(response.start_time);
                            $('#end-time').text(response.end_time);
                            $('#event-priority').text(response.priority);
                            $('#created_by1').text(response.created_by);
                            $('#updated_by1').text(response.updated_by);
                        },
                        error: function(xhr, status, error){
                            console.error(xhr.responseText);
                        }
                    });

                },
                selectAllow: function(event)
                {
                    return moment(event.start).utcOffset(false).isSame(moment(event.end).subtract(1, 'second').utcOffset(false), 'day');
                },
            });

            $("#bookingModal").on("hidden.bs.modal", function () {
                $('#saveBtn').unbind();
            });

            $('#deleteBtn').click(function(){
                var id = $("#destroy").text();
                console.log(id);

                        if(confirm('Are you sure want to remove it')){
                        $.ajax({
                            url:"{{ route('calendar.destroy', '') }}" +'/'+ id,
                            type:"DELETE",
                            dataType:'json',
                            success:function(response)
                            {
                                $('#calendar').fullCalendar('removeEvents', response);
                                $('#viewModal').modal('hide');
                                swal("Good job!", "Event Deleted!", "success");
                            },
                            error:function(error)
                            {
                                console.log(error)
                            },
                        });
                        }
                    });

            $('.fc-event').css('font-size', '13px');
            $('.fc-event').css('width', '');
            $('.fc-event').css('border-radius', '5px');

        });
    </script>

    <script>

    </script>


</body>
</html>
