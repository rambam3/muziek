<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <h1>Create Song</h1>
    <form>
        <label for="song">Song:</label>
        <input type="text" id="song" name="song">
        <button type="submit">Save</button>
    </form>
    <br>
    <a href="{{ route('index') }}">Back to list</a>
</body>
</html>