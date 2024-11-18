<h1>Create a New Band</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="{{ route('bands.store') }}">
    @csrf
    <label for="name">Band name:</label>
    <input type="text" id="name" name="name">

    <label for="genre">Genre:</label>
    <input type="text" id="genre" name="genre">

    <label for="founded">Founded:</label>
    <input type="number" id="founded" name="founded">

    <label for="active_till">Active till:</label>
    <input type="text" id="active_till" name="active_till" placeholder="default heden">

    <button type="submit">Add band</button>
</form>

<br>
<a href="{{ route('bands.index') }}">Back to list</a>
