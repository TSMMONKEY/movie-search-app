<?php

namespace App\Livewire;

use Livewire\Component;

class SearchResults extends Component
{
    public $movies = []; // Local movies array

    protected $listeners = ['moviesUpdated' => 'updateMovies'];

    public function updateMovies($movies)
    {
        $this->movies = $movies;
    }

    public function render()
    {
        return view('livewire.search-results', ['movies' => $this->movies]);
    }
}
