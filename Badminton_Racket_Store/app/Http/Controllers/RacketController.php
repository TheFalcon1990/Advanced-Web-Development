<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Racket;

class RacketController extends Controller
{
    function index(Request $request)
    {
        // Get the search query from the request
        $search = $request->input('search');
        
        // Retrieve rackets based on search query and paginate
        $rackets = Racket::when($search, function ($query) use ($search) {
            $searchTerms = explode(' ', $search);
            return $query->where(function($query) use ($searchTerms) {
                foreach ($searchTerms as $term) {
                    $query->where(function($q) use ($term) {
                        $q->where('title', 'like', '%' . $term . '%')
                          ->orWhere('company', 'like', '%' . $term . '%');
                    });
                }
            });

        })->paginate(5); // Adjust the number of items per page as needed

        return view('rackets.index', [
            'rackets' => $rackets,
            'search' => $search // Pass the search query back to the view
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

    function store(Request $request)
    {
        $racket = new Racket();
        $racket->title = $request->title;
        $racket->year = $request->year;
        $racket->company = $request->company;
        $racket->level = $request->level;

        $racket->save();
        return redirect('/rackets');
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
        return redirect('/rackets');
    }

    public function destroy(Request $request)
    {
        // Find the racket using Eloquent
        $racket = Racket::find($request->id);

        // Delete the racket
        $racket->delete();

        // Redirect to the homepage
        return redirect('/rackets');
    }
}