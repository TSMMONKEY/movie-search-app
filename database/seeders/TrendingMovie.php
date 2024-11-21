<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrendingMovies;

class TrendingMovie extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = env('OMDB_API_KEY'); // Replace with your actual API key
        $movieTitles = ['Avengers: Infinity War', 'Inception', 'The Dark Knight', 'Interstellar', 'The Matrix', 'Fight Club','FIFA Uncovered','Ronaldo'];
        $movies = [];

        foreach ($movieTitles as $title) {
            $response = file_get_contents("http://www.omdbapi.com/?t=" . urlencode($title) . "&apikey=" . $apiKey);
            $data = json_decode($response, true);
            if ($data['Response'] === 'True') {
                $movies[] = [
                    'title' => $data['Title'],
                    'imdb_id' => $data['imdbID'],
                    'search_count' => 0,
                ];
            }
        }

        foreach ($movies as $movie) 
        {
            TrendingMovies::updateOrCreate(['imdb_id' => $movie['imdb_id']], $movie);
        }
    }
}
