<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
</head>
<body>
    <h1>Band List</h1>
    <ul>
        @foreach($bands as $index => $band)
            <li><a href="{{ route('bands.show', $band->id) }}">{{ $band->name }}</a></li>
            <form action="{{ route('bands.destroy', $band->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
            </form>
        @endforeach
    </ul>
    <a href="{{ route('bands.create') }}">Create a new band</a>
</body>
</html>
