<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Song List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('home') }}" class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition focus:outline-none focus:ring-4 focus:ring-blue-300">
                Back to Home
            </a>
        </div>

        <h1 class="text-4xl font-bold text-center mb-10 text-gray-800">🎵 Song List</h1>
        
        <ul class="space-y-6">
            @foreach($songs as $index => $song)
            <li class="bg-white p-6 rounded-lg shadow flex items-center justify-between">
                <div>
                    <a href="{{ route('songs.show', $song->id) }}" class="text-xl font-semibold text-blue-600 hover:underline">{{ $song->title }}</a>
                </div>
                <form action="{{ route('songs.destroy', $song->id) }}" method="POST" class="ml-4">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 focus:outline-none focus:ring-2 focus:ring-red-400">
                        Delete
                    </button>
                </form>
            </li>
            @endforeach
        </ul>   
          
        <div class="mt-12 text-center">
            <a href="{{ route('songs.create') }}" class="inline-block bg-green-500 text-white px-8 py-4 rounded-lg shadow hover:bg-green-600 transition focus:outline-none focus:ring-4 focus:ring-green-400">
                + Create a New Song
            </a>
        </div>
    </div>
</body>
</html>

