<!DOCTYPE html>
<html>

<head>
    <meta charset='utf-8' />
    <link href='{{asset("assets/fullcalendar/lib/main.css")}}' rel='stylesheet' />
    <link href='{{asset("assets/fullcalendar/css/style.css")}}' rel='stylesheet' />
    <script src='{{asset("assets/fullcalendar/lib/main.js")}}'></script>

    <script src='{{asset("assets/fullcalendar/js/script.js")}}'></script>
    <script src='{{asset("assets/fullcalendar/js/calendar.js")}}'></script>


    <script src='{{asset("assets/fullcalendar/lib/locales-all.js")}}'></script>


</head>

<body>
    <div id='wrap'>

        <div id='external-events'>
            <h4>Draggable Events</h4>

            <div id='external-events-list'>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>My Event 1</div>
                </div>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>My Event 2</div>
                </div>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>My Event 3</div>
                </div>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>My Event 4</div>
                </div>
                <div class='fc-event fc-h-event fc-daygrid-event fc-daygrid-block-event'>
                    <div class='fc-event-main'>My Event 5</div>
                </div>
            </div>

            <p>
                <input type='checkbox' id='drop-remove' />
                <label for='drop-remove'>remove after drop</label>
            </p>
        </div>

        <div id='calendar-wrap'>
            <div id='calendar' data-route-load-events="{{route('routeLoadEvents')}}"></div>
        </div>

    </div>
</body>

</html>