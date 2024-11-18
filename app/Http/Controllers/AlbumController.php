<?php

namespace App\Http\Controllers;

use App\Models\Album;
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
        return view('albums.create');
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
        ]);

        return redirect()->route('albums.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Album $album)
    {
        return view('albums.show', compact('album'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $album = Album::findOrFail($id);
        return view('albums.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100|regex:/^[a-zA-Z0-9\s]+$/',
            'year' => 'required|integer|min:1900|max:' . date('Y'),
            'times_sold' => 'required|integer|min:0',
        ]);

        $album = Album::find($id);
        $album->name = $request->input('name');
        $album->year = $request->input('year');
        $album->times_sold = $request->input('times_sold');
        $album->save();

        return redirect()->route('albums.index');
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
