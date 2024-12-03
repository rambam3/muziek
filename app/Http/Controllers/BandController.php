<?php

namespace App\Http\Controllers;

use App\Models\Band;
use App\Models\Album;
use Illuminate\Http\Request;
use PHPUnit\Framework\Constraint\IsEmpty;
use DB;

class BandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bands = Band::all();
        return view('bands.index', compact('bands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('bands.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => ['required', 'integer', 'max:' . date('Y')],
            'active_till' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    if (!is_numeric($value) && $value !== 'heden') {
                        $fail('The ' . $attribute . ' must be either a valid year, "heden" or empty.');
                    }

                    if (is_numeric($value) && $value <= $request->input('founded')) {
                        $fail('The active until year must be less than the founded year.');
                    }
                    if ($value > date('Y')) {
                        $fail('The active until year must be before or equal to the current year.');
                    }
                },
                'max:' . date('Y')
            ],
        ], 
        [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'genre.required' => 'The genre field is required.',
            'genre.string' => 'The genre must be a string.',
            'genre.max' => 'The genre may not be greater than 255 characters.',
            'founded.required' => 'The founded field is required.',
            'founded.integer' => 'The founded year must be a number.',
            'founded.max' => 'The founded year must be before or equal to the current year.',
            'active_till.max' => 'The active until year must be before or equal to the current year.',
        ]);

        $active_till = $request->input('active_till', 'heden');
        if (empty($active_till)) {
            $active_till = 'heden';
        }
        if($active_till > date('Y')) {
            $active_till = 'heden';
        }
        Band::create([
            'name' => $request->input('name'),
            'genre' => $request->input('genre'),
            'founded' => $request->input('founded'),
            'active_till' => $active_till,
        ]);

        return redirect()->route('bands.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Band $band)
    {
        $albums = Album::where('band_id', $band->id)->get();
        return view('bands.show', compact('band', 'albums'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Band $band)
    {
        return view('bands.edit', compact('band'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Band $band)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'genre' => 'required|string|max:255',
            'founded' => ['required', 'integer', 'max:' . date('Y')],
            'active_till' => [
                'nullable',
                function ($attribute, $value, $fail) use ($request) {
                    if (!is_numeric($value) && $value !== 'heden') {
                        $fail('The ' . $attribute . ' must be either a valid year or "heden".');
                    }
                    if (is_numeric($value) && $value <= $request->input('founded')) {
                        $fail('The active until year must be greater than the founded year.');
                    }
                    if (is_numeric($value) && $value > date('Y')) {
                        $fail('The active until year must not be in the future.');
                    }
                },
                'max:' . date('Y'),
            ],
        ], [
            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a string.',
            'name.max' => 'The name may not be greater than 255 characters.',
            'genre.required' => 'The genre field is required.',
            'genre.string' => 'The genre must be a string.',
            'genre.max' => 'The genreactive_till may not be greater than 255 characters.',
            'founded.required' => 'The founded field is required.',
            'founded.integer' => 'The founded year must be a number.',
            'founded.max' => 'The founded year must be before or equal to the current year.',
            'active_till.required' => 'The active until field is required.',
            'active_till.max' => 'The active until year must be before or equal to the current year.',
        ]);

        $band->name = $request->input('name');
        $band->genre = $request->input('genre');
        $band->founded = $request->input('founded');
        $band->active_till = $request->input('active_till' , 'heden');
        if (empty($band->active_till)) {
            $band->active_till = 'heden';
        }
        $band->save();

        return redirect()->route('bands.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Band $band)
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        $albums = Album::where('band_id', $band->id)->get();
        foreach ($albums as $album) {
            $album->band_id = 0;
            $album->save();
        }
        $band->delete();
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        return redirect()->route('bands.index');
    }
}
