<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Album Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('albums.index') }}"
                class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition focus:outline-none focus:ring-4 focus:ring-blue-300">
                Back to Album List
            </a>
        </div>

        <div class="bg-white p-8 rounded-lg shadow">
            <h1 class="text-4xl font-bold mb-6 text-center">💿 Album Details</h1>
            <div class="grid grid-cols-1 md:grid-cols-[auto_1fr] gap-x-6">
                <p class="text-lg mb-4"><span class="font-semibold">Name:</span> </p>
                <div>{{ $album['name'] }}</div>

                <p class="text-lg mb-4"><span class="font-semibold">Year:</span> </p>
                <div>{{ $album['year'] }}</div>
                
                <p class="text-lg mb-4"><span class="font-semibold">Times Sold:</span> </p>
                <div>{{ $album['times_sold'] }}</div>

                <!-- Band Section -->
                <p class="text-lg mb-4"><span class="font-semibold">Band:</span></p>
                <div>
                    @if ($band === null)
                        <span class="text-gray-500 italic">This album has no band.</span>
                    @else
                        {{ $band['name'] }}
                    @endif
                </div>

                <!-- Songs Section -->
                <p class="text-lg mb-4"><span class="font-semibold">Songs:</span></p>
                <div>
                    @if ($albumSongs === null || $albumSongs->isEmpty())
                        <span class="text-gray-500 italic">This album has no songs.</span>
                    @else
                        <ul class="list-disc pl-6">
                            @foreach ($albumSongs as $albumSong)
                                <li class="text-lg mb-2"> {{ $albumSong['title'] }}</li>
                            @endforeach
                        </ul>
                    @endif
                </div>
            </div>

            <div class="mt-6 flex justify-center">
                <a href="{{ route('albums.edit', $album) }}"
                    class="inline-block bg-yellow-500 text-white px-6 py-3 rounded shadow hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                    Edit Album
                </a>
            </div>
        </div>
    </div>
</body>

</html>
