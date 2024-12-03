<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Song;
use App\Models\Album;

class SongController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $songs = Song::all();
        return view('songs.index', compact('songs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('songs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'singer' => 'string|nullable|max:100|regex:/^[a-zA-Z0-9\s]+$/'  
        ]);
        Song::create([
            'title' => $request->input('title'),
            'singer' => $request->input('singer')
        ]);
        return redirect()->route('songs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Song $song)
    {   
        return view('songs.show', compact('song'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Song $song)
    {
        $song = Song::findOrFail($song->id);
        $albums = Album::all();
        $songAlbums = $song -> albums;
        return view('songs.edit', compact('song', 'songAlbums', 'albums'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Song $song, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'singer' => 'string|nullable|max:100|regex:/^[a-zA-Z0-9\s]+$/'  
        ]);

        $song->update($request->except('_token','album_id','remove_album_id'));
        if ($request->has('album_id')) {
            $song->albums()->attach($request->input('album_id'));
        }
        if ($request->has('remove_album_id')) {
            $song->albums()->detach($request->input('remove_album_id'));
        }

        return redirect()->route('songs.edit', $song->id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        DB::table('album_song')->where('song_id', $id)->delete();
        $song = Song::find($id);
        $song->delete();
        return redirect()->route('songs.index');
    }
}
