<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Film;

class FilmController extends Controller
{
    function index()
    {
        $films = Film::all();
        return view('films.index',['films' => $films]);
    }
    function create()
    {
        return view('films.create');
    }

    function about()
    {
        $films = Film::all();
        return view('films.about',['films' => $films]);
    }
    function store(Request $request)
{
    $film = new Film();
    $film->title = $request->title;
    $film->year = $request->year;
    $film->duration = $request->duration;
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

public function update(Request $request)
{
    // Validate the request data
    $request->validate([
        'id' => 'required|exists:films,id',
        'title' => 'required|string|max:255|unique:films,title,' . $request->input('id'),
        'year' => 'required|integer|unique:films,year,' . $request->input('id'),
        'duration' => 'required|integer',
    ]);

    // Get the film ID from the request
    $filmId = $request->input('id');

    // Find the film using Eloquent
    $film = Film::find($filmId);

    if (!$film) {
        return redirect('/films')->with('error', 'Film not found!');
    }

    // Update the film properties
    $film->title = $request->input('title');
    $film->year = $request->input('year');
    $film->duration = $request->input('duration');

    // Save the updated film
    $film->save();

    // Redirect to the films index page with a success message
    return redirect('/films');
}

public function destroy(Request $request)
    {
       
        // Find the film using Eloquent
        $film = Film::find($request->id);

        // Delete the film
        $film->delete();

        // Redirect to the homepage
        return redirect('/films');
    }
}

