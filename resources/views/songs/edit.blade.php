<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Song</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('songs.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Back to Song List
            </a>
        </div>

        <div class="bg-white p-8 rounded-lg shadow">
            <h1 class="text-3xl font-bold text-center mb-6">🎵 Edit Song</h1>
            
            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
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

                <div class="mb-4">
                    <label for="title" class="block font-semibold">Title:</label>
                    <input type="text" id="title" name="title" value="{{ $song->title }}" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="singer" class="block font-semibold">Singer:</label>
                    <input type="text" id="singer" name="singer" value="{{ $song->singer }}" class="w-full p-2 border rounded">
                </div>

                <!-- Albums and Add Album Section -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <!-- Albums that have song -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Albums that have song</h2>
                        <ul class="list-disc pl-5 space-y-2">
                            @foreach ($songAlbums as $album)
                                <li class="flex justify-between items-center">
                                    <span>{{ $album->name }}</span>
                                    <button type="submit" name="remove_album_id" value="{{ $album->id }}" class="text-red-500 hover:text-red-700">
                                        Remove
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <!-- Add Album Section -->
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Add Album</h2>
                        <select name="album_id" id="album_id" class="w-full p-2 border rounded shadow-sm focus:ring focus:ring-green-300">
                            <option value="">Select an album</option>
                            @foreach ($albums as $album)
                                @if (!$songAlbums->contains($album))
                                    <option value="{{ $album->id }}">{{ $album->name }}</option>
                                @endif
                            @endforeach
                        </select>
                        <button type="submit" class="mt-2 bg-green-500 text-white px-6 py-2 rounded-md hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-500">
                            Add Album
                        </button>
                    </div>
                </div>

                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300 mt-6">
                    Save Changes
                </button>
            </form>
        </div>
    </div>
</body>
</html>
