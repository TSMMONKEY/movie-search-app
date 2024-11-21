<?php

namespace Tests\Unit;

use App\Livewire\Search;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class SearchTest extends TestCase
{
    /** @test */
    public function it_can_search_for_movies_successfully()
    {
        // Mock the API response for a successful search with results
        Http::fake([
            'www.omdbapi.com/*' => Http::sequence()
                ->push(['Search' => [['Title' => 'Movie 1'], ['Title' => 'Movie 2']]]) // Simulate results
                ->push(['Response' => 'False', 'Error' => 'Movie not found!']), // Simulate no results
        ]);

        // Create the Search component instance
        $searchComponent = new Search();
        $searchComponent->search = 'Movie';

        // Test successful search
        $searchComponent->searchMovie();
        $this->assertCount(2, $searchComponent->movies); // Check that two movies are returned
        $this->assertEmpty(session()->get('movie_not_found')); // Check no error session exists

        // Test search with no results
        $searchComponent->search = 'NonExistentMovie';
        $searchComponent->searchMovie();
        $this->assertEmpty($searchComponent->movies); // Ensure no movies are returned
        $this->assertEquals('No movies found for your search.', session()->get('movie_not_found')); // Check session for error message
    }

    /** @test */
    public function it_handles_api_errors()
    {
        // Mock the API response to simulate an error
        Http::fake([
            'www.omdbapi.com/*' => Http::response([], 500), // Simulate a server error
        ]);

        // Create the Search component instance
        $searchComponent = new Search();
        $searchComponent->search = 'Movie';
        $searchComponent->searchMovie();

        // Assert the movies array is empty and the error message is in the session
        $this->assertEmpty($searchComponent->movies);
        $this->assertEquals('There was an error with the API request. Please try again later.', session()->get('api_error'));
    }

/** @test */
    public function it_handles_unexpected_exceptions()
    {
        // Mock the API response to simulate an exception
        Http::fake(function ($request) {
            throw new \Exception('Unexpected API error');
        });

        // Create the Search component instance
        $searchComponent = new Search();
        $searchComponent->search = 'Movie';

        // Expect an exception to be thrown and catch it
        try {
            $searchComponent->searchMovie();
        } catch (\Exception $e) {
            // Assert the correct exception message
            $this->assertEquals('Unexpected API error', $e->getMessage());
        }

        // Assert that the movies array is empty and the error message is in the session
        $this->assertEmpty($searchComponent->movies);
        $this->assertEquals('An unexpected error occurred: Unexpected API error', session()->get('api_error'));
    }

    protected function setUp(): void
    {
        parent::setUp();

        // Start the session explicitly for tests
        Session::start();
    }
}
