<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Band Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800">
    <div class="container mx-auto p-6">
        <div class="mb-6">
            <a href="{{ route('bands.index') }}" class="inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded shadow hover:bg-blue-600 transition focus:outline-none focus:ring-4 focus:ring-blue-300">
                Back to Band List
            </a>
        </div>

        <div class="bg-white p-8 rounded-lg shadow">
            <h1 class="text-4xl font-bold mb-6 text-center">🎸 Band Details</h1>
            <p class="text-lg mb-4"><span class="font-semibold">Name:</span> {{ $band['name'] }}</p>
            <p class="text-lg mb-4"><span class="font-semibold">Genre:</span> {{ $band['genre'] }}</p>
            <p class="text-lg mb-4"><span class="font-semibold">Founded:</span> {{ $band['founded'] }}</p>
            <p class="text-lg mb-4"><span class="font-semibold">Active Till:</span> {{ $band['active_till'] }}</p>

            <div class="mt-6 flex justify-center">
                <a href="{{ route('bands.edit', $band) }}" class="inline-block bg-yellow-500 text-white px-6 py-3 rounded shadow hover:bg-yellow-600 focus:outline-none focus:ring-4 focus:ring-yellow-300">
                    Edit Band
                </a>
            </div>
        </div>
    </div>
</body>
</html>
