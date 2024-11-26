<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;
use App\Models\Certificate;


class FilmController extends Controller
{
    function index()
    {
        $films = Film::byDecade(2000)->get();
        return view('films.index', ['films' => $films]);
    }

    function about()
    {
        $films = Film::all();
        return view('films.about',['films' => $films]);
    }


    // function show($id)
    
    function listByDecade($decade = 2000)
    {
        $films = Film::byDecade($decade)->get();
        return response()->json($films);
    }


    function store(Request $request)
    {
        $film = new Film();
        $film->title = $request->title;
        $film->year = $request->year;
        $film->duration = $request->duration;
        $film->certificate_id = $request->certificate_id;
        $film->save();
        return redirect('/films');
    }

function show($id)
{
    $film = Film::find($id);
    return view('films.show', ['film' => $film]);
}

function edit($id)
{
    $film = Film::find($id);
    return view('films.edit', ['film' => $film]);
}

public function update(Request $request, $id)
{
    // Validate the request data
    $request->validate([
        'title' => 'required|string|max:255|unique:films,title,' . $id,
        'year' => 'required|integer',
        'duration' => 'required|integer',
    ]);

    // Find the film using Eloquent
    $film = Film::findOrFail($id); // Automatically throws a 404 if not found

    // Update the film properties
    $film->title = $request->input('title');
    $film->year = $request->input('year');
    $film->duration = $request->input('duration');

    // Save the updated film
    $film->save();

    // Redirect to the films index page with a success message
    return redirect()->route('films.index')->with('success', 'Film updated successfully');
}

public function destroy($id)
{
    // Find the film using Eloquent
    $film = Film::find($id);

    // Check if the film exists
    if (!$film) {
        return redirect()->route('films.index')->with('error', 'Film not found!');
    }

    // Delete the film
    $film->delete();

    // Redirect to the films index page with a success message
    return redirect()->route('films.index')->with('success', 'Film deleted successfully');
}
}