<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Album List</h1>
    <ul>
        @foreach($albums as $index => $album)
            <li><a href="{{ route('albums.show', $album->id) }}">{{ $album->name }}</a></li>
            <form action="{{ route('albums.destroy', $album->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>
    <a href="{{ route('albums.create') }}">Create a new album</a>
</body>
</html>
