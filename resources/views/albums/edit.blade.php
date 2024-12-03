<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Album</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('albums.index') }}"
                class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Back to Album List
            </a>
        </div>

        <div class="bg-white p-8 rounded-lg shadow">
            <h1 class="text-3xl font-bold text-center mb-6">💿 Edit Album</h1>

            @if ($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
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

                <div class="mb-4">
                    <label for="name" class="block font-semibold">Name:</label>
                    <input type="text" id="name" name="name" value="{{ $album->name }}"
                        class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="year" class="block font-semibold">Year:</label>
                    <input type="number" id="year" name="year" value="{{ $album->year }}"
                        class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="times_sold" class="block font-semibold">Times Sold:</label>
                    <input type="number" id="times_sold" name="times_sold" value="{{ $album->times_sold }}"
                        class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="band_id" class="block font-semibold">Band:</label>
                    <select name="band_id" id="band_id" class="w-full p-2 border rounded" required>
                        <option value="">Select a Band</option>
                        @foreach ($bands as $band)
                            <option value="{{ $band['id'] }}" @if($band['id'] === $album->band_id) selected @endif>
                                {{ $band['name'] }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                    <div>
                        <h2 class="text-xl font-semibold mb-4">Songs in Album</h2>
                        @if ($albumSongs->isEmpty())
                            <p class="text-gray-500 italic">No songs in this album yet.</p>
                        @else
                            <ul class="list-disc pl-5 space-y-2">
                                @foreach ($albumSongs as $song)
                                    <li class="flex justify-between items-center">
                                        <span>{{ $song->title }}</span>
                                        <button type="submit" name="remove_song_id" value="{{ $song->id }}"
                                            class="text-red-500 hover:text-red-700">
                                            Remove
                                        </button>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>

                    <div>
                        <h2 class="text-xl font-semibold mb-4">Add Songs</h2>
                        <div class="flex items-center space-x-2">
                            <select name="song_id" id="song_id"
                                class="w-full p-2 border rounded shadow-sm focus:ring focus:ring-green-300">
                                <option value="">Select a Song</option>
                                @foreach ($songs as $song)
                                    @if (!$albumSongs->contains($song))
                                        <option value="{{ $song->id }}">{{ $song->title }}</option>
                                    @endif
                                @endforeach
                            </select>
                            <button type="submit"
                                class="bg-green-500 text-white px-4 py-2 rounded-md hover:bg-green-600 focus:outline-none focus:ring-2 focus:ring-green-300">
                                Add
                            </button>
                        </div>
                    </div>
                </div>

                <div class="mt-6 text-center">
                    <button type="submit"
                        class="bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
                        Save Changes
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
