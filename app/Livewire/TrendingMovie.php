<?php

namespace App\Livewire;

use App\Models\TrendingMovies;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class TrendingMovie extends Component
{
    public function render()
    {
        $trendingMovies = TrendingMovies::orderBy('search_count', 'desc')
            ->take(8)
            ->get()
            ->shuffle(); // Shuffle the records after fetching them

        // Extract imdb_id from trending movies
        $imdbIds = $trendingMovies->pluck('imdb_id');

        $moviesData = []; // Initialize an array to hold movie data

        // Loop through each imdb_id and fetch movie details
        foreach ($imdbIds as $imdbId) {
            $query = 'https://www.omdbapi.com/?apikey=' . env('OMDB_API_KEY') . '&i=' . $imdbId;
            $response = Http::get($query);
            $moviesData[] = $response->json(); // Collect each movie's data
        }
        // dd($moviesData);
        return view('livewire.trending-movie', ['moviesData' => $moviesData]);
    }
}
