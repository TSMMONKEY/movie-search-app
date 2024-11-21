<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Movie;

class MoviesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $apiKey = env('OMDB_API_KEY'); // Replace with your actual API key
        $movieTitles = ['Avengers: Infinity War', 'Inception', 'The Dark Knight', 'Interstellar', 'The Matrix', 'Fight Club'];
        $movies = [];

        foreach ($movieTitles as $title) {
            $response = file_get_contents("http://www.omdbapi.com/?t=" . urlencode($title) . "&apikey=" . $apiKey);
            $data = json_decode($response, true);
            if ($data['Response'] === 'True') {
                $movies[] = [
                    'title' => $data['Title'],
                    'imdb_id' => $data['imdbID'],
                    'released' => $data['Released'],
                    'imdb_rating' => $data['imdbRating'],
                    'imdb_votes' => (int) str_replace(',', '', $data['imdbVotes']),
                    'search_count' => 0,
                    'poster' => !empty($data['Poster']) ? $data['Poster'] : '/assets/images/popular-05.jpg',
                ];
            }
        }

        foreach ($movies as $movie) 
        {
            Movie::updateOrCreate(['imdb_id' => $movie['imdb_id']], $movie);
        }
    }
}
