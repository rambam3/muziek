<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>show</title>
</head>
<body>
    <h1>Song Details</h1>
    <p>title: {{ $song['title'] }}</p>
    <?php if ($song['singer'] != '') {
    echo "<p>singer: {$song['singer']}</p>";
    }
?>
    <a href="{{route('songs.edit', $song)}}">edit</a>
    <a href="{{ route('songs.index') }}">Back to list</a>
</body>
</html>