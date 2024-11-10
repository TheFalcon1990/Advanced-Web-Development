<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Racket;

class RacketController extends Controller
{
    public function index(Request $request)
{
    // Get the search query from the request
    $search = $request->input('search');

    // Normalize the search input by removing special characters
    $normalizedSearch = preg_replace('/[^a-zA-Z0-9]/', '', $search);

    // Retrieve rackets based on search query and paginate
    $rackets = Racket::when($normalizedSearch, function ($query) use ($normalizedSearch) {
        $searchTerms = explode(' ', $normalizedSearch);
        return $query->where(function($query) use ($searchTerms) {
            foreach ($searchTerms as $term) {
                $query->where(function($q) use ($term) {
                    // Normalize the company and title fields by removing special characters
                    $q->whereRaw("REPLACE(title, '-', '') LIKE ?", ['%' . $term . '%'])
                      ->orWhereRaw("REPLACE(company, '-', '') LIKE ?", ['%' . $term . '%']);
                });
            }
        });
    })->paginate(5); // Adjust the number of items per page as needed

    // Get the total number of rackets in the database
    $totalRackets = Racket::count();

    // Pass the search query and total rackets back to the view
    return view('rackets.index', [
        'rackets' => $rackets,
        'search' => $search,
        'totalRackets' => $totalRackets // Pass the total number of rackets
    ]);
}

    function create()
    {
        return view('rackets.create');
    }

    function about()
    {
        $rackets = Racket::all();
        return view('rackets.about', ['rackets' => $rackets]);
    }

    public function store(Request $request)
{
    // Call the validation method
    $this->validateRacket($request);

    // Create a new racket instance
    $racket = new Racket();
    $racket->title = $request->title;
    $racket->year = $request->year;
    $racket->company = $request->company;
    $racket->level = $request->level;

    // Save the racket
    $racket->save();

    // Redirect to the rackets index page with a success message
    return redirect('/rackets')->with('success', 'Racket created successfully!');
}


    function show($id)
    {
        $racket = Racket::find($id);
        return view('rackets.show', ['racket' => $racket]);
    }

    function edit($id)
    {
        $racket = Racket::find($id);
        return view('rackets.edit', ['racket' => $racket]);
    }

    public function update(Request $request)
{
    // Call the validation method
    $this->validateRacket($request);

    // Get the racket ID from the request
    $racketId = $request->input('id');

    // Find the racket using Eloquent
    $racket = Racket::find($racketId);

    if (!$racket) {
        return redirect('/rackets')->with('error', 'Racket not found!');
    }

    // Update the racket properties
    $racket->company = $request->input('company');
    $racket->title = $request->input('title');
    $racket->year = $request->input('year');
    $racket->level = $request->input('level');

    // Save the updated racket
    $racket->save();

    // Redirect to the rackets index page with a success message
    return redirect('/rackets')->with('success', 'Racket updated successfully!');
}


public function destroy(Request $request)
{
    // Find the racket using Eloquent
    $racket = Racket::find($request->id);

    if (!$racket) {
        return redirect('/rackets')->with('error', 'Racket not found!'); // Handle case if racket doesn't exist
    }

    // Delete the racket
    $racket->delete();

    // Redirect to the homepage with a success message
    return redirect('/rackets')->with('success', 'Racket deleted successfully!'); // Updated message
}

public function validateRacket(Request $request)
{
    return $request->validate([
        'company' => 'required|string|max:255',
        'title' => 'required|string|max:255',
        'year' => 'required|integer|min:1900|max:' . date('Y'),
        'level' => 'required|in:beginner,amateur,professional',
    ], [
        'company.required' => 'The company name is required.',
        'company.string' => 'The company must be a valid string.',
        'company.max' => 'The company cannot exceed 255 characters.',
        
        'title.required' => 'The title is required.',
        'title.string' => 'The title must be a valid string.',
        'title.max' => 'The title cannot exceed 255 characters.',
        
        'year.required' => 'The year is required.',
        'year.integer' => 'The year must be a valid number.',
        'year.min' => 'The year must be after 1900.',
        'year.max' => 'The year cannot be later than the current year.',
        
        'level.required' => 'The level is required.',
    ]);
}

}