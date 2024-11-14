<h1>Create a New Song</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form method="POST" action="{{ route('songs.store') }}">
    @csrf
    <label for="title">Song name:</label>
    <input type="text" id="title" name="title">
    <label for="singer">Singer name:</label>
    <input type="text" id="singer" name="singer">
    <button type="submit">Add Song</button>
</form>
<br>
<a href="{{ route('songs.index') }}">Back to list</a>