<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Music Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <header class="text-center mb-12">
            <h1 class="text-4xl font-bold text-gray-800">Welcome to Music World</h1>
            <p class="text-lg text-gray-600 mt-4">Explore your favorite songs, albums, and bands.</p>
        </header>

        <div class="flex flex-wrap justify-center gap-8">
            <a href="{{ route('songs.index') }}" class="bg-blue-500 text-white w-60 p-6 rounded-lg shadow-md hover:bg-blue-600 transition focus:outline-none focus:ring-4 focus:ring-blue-300">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Songs</h2>
                    <p class="mt-2 text-sm text-blue-100">Discover amazing songs.</p>
                </div>
            </a>

            <a href="{{ route('albums.index') }}" class="bg-green-500 text-white w-60 p-6 rounded-lg shadow-md hover:bg-green-600 transition focus:outline-none focus:ring-4 focus:ring-green-300">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Albums</h2>
                    <p class="mt-2 text-sm text-green-100">Explore albums and their stories.</p>
                </div>
            </a>

            <a href="{{ route('bands.index') }}" class="bg-purple-500 text-white w-60 p-6 rounded-lg shadow-md hover:bg-purple-600 transition focus:outline-none focus:ring-4 focus:ring-purple-300">
                <div class="text-center">
                    <h2 class="text-2xl font-semibold">Bands</h2>
                    <p class="mt-2 text-sm text-purple-100">Get to know amazing bands.</p>
                </div>
            </a>
        </div>
    </div>
</body>
</html>
