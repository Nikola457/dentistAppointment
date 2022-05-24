<!DOCTYPE html>
<html>
<head>
    <title>How to Use Fullcalendar in Laravel 8</title>
    
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
</head>
<body>
  
<div class="container">
    <br />
    <h5 class="text-left text-primary">Ime pacijenta: {{$user->name}}<br>
    Broj Telefona: {{$user->phone}}<br>
    Email: {{$user->email}}
    <br>Zeljeni Termin Pacijenta: {{$schedule->scheduleDate}} - {{$schedule->scheduleEndDate}}</h5>
    <br />
    <div id="calendar"></div>

</div>
   
<script>

$(document).ready(function () {

$.ajaxSetup({
    headers:{
        'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
    }
});

var calendar = $('#calendar').fullCalendar({
    editable:true,
    header:{
        left:'prev,next today',
        center:'title',
        right:'month,agendaWeek,agendaDay'
    },
    events:'/full-calender',
    selectable:true,
    selectHelper:true,
    select:function(start, end, allDay)
        {
            var title = confirm("Da li ste sigurni?");
            if(title)
            {
                var start = $.fullCalendar.formatDate(start, 'Y-MM-DD HH:mm:ss');

                var end = $.fullCalendar.formatDate(end, 'Y-MM-DD HH:mm:ss');

                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        title: {!! json_encode($schedule->subject) !!},
                        description: {!! json_encode($schedule->message) !!},
                        start: start,
                        end: end,
                        schedule_id: {!! json_encode($schedule->id) !!},
                        user_id: {!! json_encode($schedule->user_id) !!},
                        cover_image: {!! json_encode($schedule->cover_image) !!},
                        type: 'add',
                        scheduleDelete: 'delete'
                        
                    },
                    success:function(data)
                    {
                        calendar.fullCalendar('refetchEvents');
                        window.location.replace("dashboard");
                    }
                })
            }
        },
        editable:true,
        eventResize: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                        title: {!! json_encode($schedule->subject) !!},
                        description: {!! json_encode($schedule->message) !!},
                        start: start,
                        end: end,
                        schedule_id: {!! json_encode($schedule->id) !!},
                        cover_image: {!! json_encode($schedule->cover_image) !!},
                        type: 'update',
                        scheduleDelete: 'delete'
                        
                    },
                success:function(response)
                {
                    calendar.fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
        },
        eventDrop: function(event, delta)
        {
            var start = $.fullCalendar.formatDate(event.start, 'Y-MM-DD HH:mm:ss');
            var end = $.fullCalendar.formatDate(event.end, 'Y-MM-DD HH:mm:ss');
            var title = event.title;
            var id = event.id;
            $.ajax({
                url:"/full-calender/action",
                type:"POST",
                data:{
                        
                        title: {!! json_encode($schedule->subject) !!},
                        description: {!! json_encode($schedule->message) !!},
                        start: start,
                        end: end,
                        schedule_id: {!! json_encode($schedule->id) !!},
                        cover_image: {!! json_encode($schedule->cover_image) !!},
                        type: 'update',
                        
                    },

                success:function(response)
                {
                    $("#calendar").fullCalendar('refetchEvents');
                    alert("Event Updated Successfully");
                }
            })
        },
        eventClick:function(event)
        {
            if(confirm("Are you sure you want to remove it?"))
            {
                var id = event.id;
                $.ajax({
                    url:"/full-calender/action",
                    type:"POST",
                    data:{
                        id:id,
                        type:"delete"
                    },
                    success:function(response)
                    {
                        calendar.fullCalendar('refetchEvents');
                        alert("Event Deleted Successfully");
                    }
                })
            }
        }
    });
});
</script>
  
</body>
</html>
