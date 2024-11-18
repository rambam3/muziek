<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold text-center mb-6">Song List</h1>
        
        <ul class="space-y-4">
            @foreach($songs as $index => $song)
            <li class="bg-white p-4 rounded shadow flex items-center justify-between">
                <a href="{{ route('songs.show', $song->id) }}" class="text-blue-500 font-semibold hover:underline">{{ $song->title }}</a>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">Delete</button>
                </form>
            </li>
            @endforeach
        </ul>
        
        <div class="mt-6 flex justify-center">
            <a href="{{ route('songs.create') }}" class="bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-400">Create a New Song</a>
        </div>
    </div>
</body>
</html>