<!DOCTYPE html>
<html>
<head>
    <title>Liste des Programmes et Présences</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table, th, td {
            border: 1px solid black;
        }

        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Liste des Programmes et Présences</h1>
    <table>
        <thead>
            <tr>
                <th>Jour</th>
                <th>Matière</th>
                <th>Prof</th>
                <th>Heure de début</th>
                <th>Heure de fin</th>
                <th>Durée (minutes)</th>
                <th>Présences</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($programs as $program)
                <tr>
                    <td>{{ \Carbon\Carbon::parse($program->day)->format('d, M Y') }}</td>
                    <td>{{ $program->course->name }}</td>
                    <td>{{ $program->course->teacher->user->name }}</td>
                    <td>{{ \Carbon\Carbon::parse($program->start_Hour)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($program->end_Hour)->format('H:i') }}</td>
                    <td>{{ \Carbon\Carbon::parse($program->start_Hour)->diffInMinutes(\Carbon\Carbon::parse($program->end_Hour)) }}</td>
                    <td>
                        @foreach ($program->presence as $presence)
                         {{ $presence->student->firstName }},<br>
                        @endforeach
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
