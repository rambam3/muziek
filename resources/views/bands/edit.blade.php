<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Band</title>
</head>
<body>
    <h1>Edit Band</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('bands.update', $band->id) }}">
        @csrf
        @method('PUT')
        
        <label for="name">Band Name:</label>
        <input type="text" id="name" name="name" value="{{ $band->name }}" required>
        <br>

        <label for="genre">Genre:</label>
        <input type="text" id="genre" name="genre" value="{{ $band->genre }}" required>
        <br>

        <label for="founded">Founded:</label>
        <input type="number" id="founded" name="founded" value="{{ $band->founded }}" required>
        <br>

        <label for="active_till">Active Till:</label>
        <input type="text" id="active_till" name="active_till" value="{{ $band->active_till }}" placeholder="default heden">
        <br>

        <button type="submit">Save</button>
    </form>

    <br>
    <a href="{{ route('bands.index') }}">Back to list</a>
</body>
</html>
