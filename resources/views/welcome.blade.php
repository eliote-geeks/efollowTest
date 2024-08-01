<!DOCTYPE html>
<html>
<head>
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.css' rel='stylesheet' />
    <link href='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.css' rel='stylesheet' />
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/core@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/daygrid@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/timegrid@5.10.1/main.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/@fullcalendar/interaction@5.10.1/main.min.js'></script>
</head>
<body>
    <div>
        <form id="schedule-form" action="{{ route('program.store') }}" method="POST">
            @csrf
            <div>
                <label for="day">Jour</label>
                <select name="day" id="day">
                    <option value="lundi">Lundi</option>
                    <option value="mardi">Mardi</option>
                    <option value="mercredi">Mercredi</option>
                    <option value="jeudi">Jeudi</option>
                    <option value="vendredi">Vendredi</option>
                    <option value="samedi">Samedi</option>
                    <option value="dimanche">Dimanche</option>
                </select>
            </div>

            <div>
                <label for="course">Matière</label>
                <input type="text" name="course" id="course" required>
            </div>

            <div>
                <label for="start_hour">Heure de début</label>
                <input type="time" name="start_hour" id="start_hour" required>
            </div>

            <div>
                <label for="end_hour">Heure de fin</label>
                <input type="time" name="end_hour" id="end_hour" required>
            </div>

            <button type="submit">Ajouter au planning</button>
        </form>
    </div>

    <div id='calendar'></div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var calendarEl = document.getElementById('calendar');

            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['dayGrid', 'timeGrid', 'interaction'],
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay'
                },
                initialView: 'timeGridWeek',
                events: @json($schedules)
            });

            calendar.render();
        });
    </script>
</body>
</html>
