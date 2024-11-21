# Project Overview

This Laravel 11 application interacts with the OMDB API to enable users to:

- Search for movies by title.
- View detailed information about selected movies.
- Browse trending movies, with trends determined based on custom logic (e.g., most searched).

Bonus features include integration with Laravel Sail for Docker, Livewire for interactive pages, and robust error handling.

## Setup Instructions

### Prerequisites

- **PHP**: Version 8.2 or higher.
- **Composer**: Dependency management tool.
- **Docker**: If using Laravel Sail for a containerized environment.

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone <repository-url>
   cd <repository-folder>
   ```

2. **Install Dependencies**
   ```bash
   composer install
   ```

3. **Environment Configuration**
   - Duplicate the `.env.example` file to create a new `.env` file:
     ```bash
     cp .env.example .env
     ```
   - Generate an application key:
     ```bash
     php artisan key:generate
     ```
   - Add your OMDB API key to the `.env` file:
     ```plaintext
     OMDB_API_KEY=your_api_key_here
     ```

4. **Database Setup (if applicable)**
   - Configure your database settings in the `.env` file:
     ```plaintext
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=your_database_name
     DB_USERNAME=your_database_user
     DB_PASSWORD=your_database_password
     ```
   - Run the migrations:
     ```bash
     php artisan migrate
     ```

5. **Run the Application**
   - To start the Laravel server:
     ```bash
     php artisan serve
     ```
   - If using Docker with Laravel Sail:
     ```bash
     ./vendor/bin/sail up
     ```

## Usage Instructions

### Search for Movies
- Navigate to the search page.
- Enter a movie title into the search bar and submit.
- View the results retrieved from the OMDB API.

### View Movie Details
- Select a movie from the search results.
- Access detailed information including title, release date, rating, and plot summary.

### View Trending Movies
- Navigate to the "Trending Movies" section.
- Browse a curated list of trending or popular movies.

## API Endpoints

### Search Movies
- **Method**: GET
- **Endpoint**: `/search?query={movie_title}`
- **Parameters**:
  - `query`: The movie title to search for.
- **Response**: JSON object containing movie search results.

### Movie Details
- **Method**: GET
- **Endpoint**: `/movies/{imdbID}`
- **Parameters**:
  - `imdbID`: The IMDb ID of the movie.
- **Response**: JSON object with detailed movie information.

### Trending Movies
- **Method**: GET
- **Endpoint**: `/trending`
- **Response**: JSON object containing a list of trending movies.

## Additional Features

### Livewire Integration (Bonus)
- **Installation**:
  ```bash
  composer require livewire/livewire
  ```
- **Interactive Components**: Search results update dynamically without a full page reload.

### Exception Handling
- Handles scenarios like invalid API keys or rate limits.
- Displays user-friendly error messages.

## Testing
- Includes unit tests for API interactions to verify:
  - Successful API calls.
  - Proper handling of failed API calls.
