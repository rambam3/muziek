<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Album</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('albums.index') }}" class="bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">
                Back to Album List
            </a>
        </div>

        <div class="bg-white p-8 rounded-lg shadow">
            <h1 class="text-3xl font-bold text-center mb-6">💿 Create a New Album</h1>

            @if ($errors->any())
            <div class="bg-red-100 text-red-700 p-4 rounded mb-6">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form method="POST" action="{{ route('albums.store') }}">
                @csrf

                <div class="mb-4">
                    <label for="name" class="block font-semibold">Album Name:</label>
                    <input type="text" id="name" name="name" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="year" class="block font-semibold">Year:</label>
                    <input type="number" id="year" name="year" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="times_sold" class="block font-semibold">Times Sold:</label>
                    <input type="number" id="times_sold" name="times_sold" class="w-full p-2 border rounded" required>
                </div>

                <div class="mb-4">
                    <label for="band_id" class="block font-semibold">Band:</label>
                    <select name="band_id" id="band_id" class="w-full p-2 border rounded" required>
                        <option value="">Select a Band</option>
                        @foreach ($bands as $band)
                            <option value="{{ $band['id'] }}">{{ $band['name'] }}</option>
                        @endforeach
                    </select>

                <button type="submit" class="bg-green-500 text-white px-6 py-3 rounded shadow hover:bg-green-600 focus:outline-none focus:ring-4 focus:ring-green-300">
                    Add Album
                </button>
            </form>
        </div>
    </div>
</body>
</html>
