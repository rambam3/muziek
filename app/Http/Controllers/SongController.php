<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Models\Song;

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
    public function edit($id)
    {
        $song = Song::findOrFail($id);
        return view('songs.edit', compact('song'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'singer' => 'string|nullable|max:100|regex:/^[a-zA-Z0-9\s]+$/'  
        ]);
        $song = Song::find($id);
        $song->title = request('title');
        $song->singer = request('singer');
        $song->save();
        return redirect()->route('songs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $song = Song::find($id);
        $song->delete();
        return redirect()->route('songs.index');
    }
}
