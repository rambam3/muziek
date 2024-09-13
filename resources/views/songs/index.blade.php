<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Song List</h1>
    <ul>
        @foreach($songs as $index => $song)
            <li><a href="{{ route('show', $index) }}">{{ $song }}</a></li>
        @endforeach
    </ul>
    <a href="{{ route('create') }}">Create a new song</a>
</body>
</html>