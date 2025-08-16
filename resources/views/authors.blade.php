<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Top 10 Famous Authors</h1>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Name</th>
                <th>Total Voter</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $author->name }}</td>
                    <td>{{ $author->total_ratings }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>