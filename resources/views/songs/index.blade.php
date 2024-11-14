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
            <li><a href="{{ route('songs.show', $song->id) }}">{{ $song->title }}</a></li>
            <form action="{{ route('songs.destroy', $song->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>
    <a href="{{ route('songs.create') }}">Create a new song</a>
</body>
</html>