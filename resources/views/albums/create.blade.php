<h1>Create a New Album</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('albums.store') }}">
    @csrf
    <label for="name">Album name:</label>
    <input type="text" id="name" name="name">
    <label for="year">Year:</label>
    <input type="number" id="year" name="year">
    <label for="times_sold">Times Sold:</label>
    <input type="number" id="times_sold" name="times_sold">
    <button type="submit">Add Album</button>
</form>
<br>
<a href="{{ route('albums.index') }}">Back to list</a>
