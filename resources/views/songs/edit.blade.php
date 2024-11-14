<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <h1>Edit Song</h1>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('songs.update', $song->id) }}">

        @csrf
        @method('PUT')
        <label for="title">Title:</label>
        <input type="text" id="title" name="title" value="{{ $song->title }}" required>
        <br>
        <label for="singer">Singer:</label>
        <input type="text" id="singer" name="singer" value="{{ $song->singer }}">
        <br>
        <button type="submit">Save</button>
    </form>
    <br>
    <a href="{{ route('songs.index') }}">Back to list</a>
</body>
</html>