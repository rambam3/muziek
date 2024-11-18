<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <h1>Edit Album</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('albums.update', $album->id) }}">

        @csrf
        @method('PUT')
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ $album->name }}" required>
        <br>
        <label for="year">Year:</label>
        <input type="number" id="year" name="year" value="{{ $album->year }}" required>
        <br>
        <label for="times_sold">Times Sold:</label>
        <input type="number" id="times_sold" name="times_sold" value="{{ $album->times_sold }}" required>
        <br>
        <button type="submit">Save</button>
    </form>
    <br>
    <a href="{{ route('albums.index') }}">Back to list</a>
</body>
</html>
