<?php

namespace App\Http\Controllers;

use App\Models\SearchedMovie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Movie; 
use App\Models\TrendingMovies; 

class SearchedMovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Fetch all trending movies

        return view('pages.home'); // Pass moviesData to the view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function single($id, $name)
    {
        // Fetch all movies to get their attributes
        $allMovies = Movie::all()->map(function ($movie) {
            return $movie->attributesToArray(); // Get only the attributes
        });

        // dd($id);        // Query the OMDB API for movie details
        $query = 'https://www.omdbapi.com/?apikey=' . env('OMDB_API_KEY') . '&i=' . $id;
        $response = Http::get($query);
        $data = $response->json();
        // dd($data);

        // Debugging: Log the API response

        // Check if the movie already exists in the database
        $TrendingMovies = TrendingMovies::where('imdb_id', $data['imdbID'])->first();

        if ($TrendingMovies) {
            // If the movie exists, increment the search count
            $TrendingMovies->increment('search_count');
        } else {
            // If the movie does not exist, create a new record
            // dd($id);
            TrendingMovies::create([
                'imdb_id' => $data['imdbID'] ?? null, // Ensure imdbID exists
                'search_count' => 1,
                'title' => $data['Title'] ?? null,
            ]);
        }

        return view('pages.single', [
            'moviesData' => $data,
            'trending' => $allMovies,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function getTrendingMovies()
    {
        // Fetch trending movies based on search_count, ordered by descending
        $trendingMovies = Movie::orderBy('search_count', 'desc')->take(10)->get();

        return view('movies.trending', compact('trendingMovies'));
    }

    /**
     * Display the specified resource.
     */
    public function show(SearchedMovie $searchedMovie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(SearchedMovie $searchedMovie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => 'required|string',
            'title' => 'required|string',
            'search_count' => 'required|integer',
        ]);

        // Find the trending movie by imdb_id
        $trendingMovie = TrendingMovies::where('imdb_id', $id)->first();

        if ($trendingMovie) {
            // Update the existing record
            $trendingMovie->update([
                'name' => $request->name,
                'imdb_id' => $request->id,
                'id' => $request->title,
                'search_count' => $request->search_count,
            ]);
        } else {
            // Handle the case where the movie does not exist
            return response()->json(['message' => 'Trending movie not found'], 404);
        }

        return response()->json(['message' => 'Trending movie updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(SearchedMovie $searchedMovie)
    {
        //
    }
}
