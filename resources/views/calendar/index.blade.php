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
                        <div class=" d-flex ">
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
                        <div class=" d-flex ">
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
