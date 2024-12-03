<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Band;
use App\Models\Song;
use Illuminate\Http\Request;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $albums = Album::all();
        return view('albums.index', compact('albums'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $bands = Band::all();
        return view('albums.create', compact('bands'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'times_sold' => 'required|integer|min:0',
        ]);

        Album::create([
            'name' => $request->input('name'),
            'year' => $request->input('year'),
            'times_sold' => $request->input('times_sold'),
            'band_id' => $request->input('band_id'),
        ]);

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        $band = Band::find($album->band_id);
        $albumSongs = $album->songs;
        return view('albums.show', compact('album', 'band', 'albumSongs'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::with('songs')->findOrFail($id);
        $bands = Band::all();
        $songs = Song::all();
        $albumSongs = $album->songs;
        return view('albums.edit', compact('album', 'bands', 'songs', 'albumSongs'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Album $album, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'times_sold' => 'required|integer|min:0',
        ]);

        $album->update($request->except('_token','song_id','remove_song_id'));
        if ($request->has('song_id')) {
            $album->songs()->attach($request->input('song_id'));
        }
        if ($request->has('remove_song_id')) {
            $album->songs()->detach($request->input('remove_song_id'));
        }

        return redirect()->route('albums.edit', $album->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $album = Album::find($id);
        $album->delete();
        return redirect()->route('albums.index');
    }
}
