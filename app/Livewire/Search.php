<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Http;

class Search extends Component
{

    public $search = ''; // Initialize search as an empty string
    public $movies = []; // Initialize movies as an empty array

    public function searchMovie()
    {
        $this->validate([
            'search' => 'required|string|max:255',
        ]);
        
        try {
            $query = 'https://www.omdbapi.com/?apikey=' . env('OMDB_API_KEY') . '&s=' . urlencode($this->search);
            $response = Http::get($query);

            // Check if the response is successful
            if ($response->successful()) {
                $data = $response->json();

                if (isset($data['Search'])) {
                    $this->movies = $data['Search'];
                    $this->dispatch('moviesUpdated', $this->movies);
                } else {
                    $this->movies = [];
                    session()->flash('movie_not_found', 'No movies found for your search.');
                    logger()->info('Session flashed: No movies found'); // Debug log
                }
            } else {
                // Handle API errors (e.g., invalid API key, rate limits)
                session()->flash('api_error', 'There was an error with the API request. Please try again later.');
            }
        } catch (\Exception $e) {
            // Handle any exceptions that occur during the API call
            session()->flash('api_error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.search', [
            'movies' => $this->movies, // Pass movies to the view
        ]);
    }
}