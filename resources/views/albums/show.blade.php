<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
</head>
<body>
    <h1>Album Details</h1>
    <p>Name: {{ $album['name'] }}</p>
    <p>Year: {{ $album['year'] }}</p>
    <p>Times Sold: {{ $album['times_sold'] }}</p>
    <a href="{{ route('albums.edit', $album) }}">Edit</a>
    <a href="{{ route('albums.index') }}">Back to list</a>
</body>
</html>
