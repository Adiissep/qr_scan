<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Report</title>
</head>
<style>
    table,
    th,
    td {
        border: 1px solid black;
    }
</style>

<body>    
    <h1>Report</h1>
    <p>Report</p>
    <table>
        <tr>
            <th>No</th>
            <th>Type Scan</th>
            <th>Name Participant</th>
            <th>Email</th>
            <th>HP</th>
            <th>Date Scan</th>
        </tr>

        @foreach ($attendances as $item)
            @php
                $no = 1;
            @endphp
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $item->scan->tittle }}</td>
                <td>{{ $item->participant->name }}</td>
                <td>{{ $item->participant->email }}</td>
                <td>{{ $item->participant->phone }}</td>
                <td>{{ $item->scan_at }}</td>
            </tr>
        @endforeach
</body> 

</html>