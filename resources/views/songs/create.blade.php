<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Song</title>
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
            <h1 class="text-3xl font-bold text-center mb-6">🎵 Create a New Song</h1>

            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('songs.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="title" class="block font-semibold">Song Name:</label>
                    <input type="text" id="title" name="title" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="singer" class="block font-semibold">Singer Name:</label>
                    <input type="text" id="singer" name="singer" class="w-full p-2 border rounded">
                </div>

                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
                    Add Song
                </button>
            </form>
        </div>
    </div>
</body>
</html>
