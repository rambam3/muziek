<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
</head>
<body>
    <h1>Band Details</h1>
    <p>Name: {{ $band['name'] }}</p>
    <p>Genre: {{ $band['genre'] }}</p>
    <p>Founded: {{ $band['founded'] }}</p>
    <p>Active Till: {{ $band['active_till'] }}</p>
    <a href="{{ route('bands.edit', $band) }}">Edit</a>
    <a href="{{ route('bands.index') }}">Back to list</a>
</body>
</html>
