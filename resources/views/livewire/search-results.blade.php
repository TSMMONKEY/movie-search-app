<div>
    @if ($movies)
        <!-- Loader appears while the action is being processed -->
        <div wire:loading wire:target="searchMovie" class="loader">
            <p>Loading...</p> <!-- You can replace this with a spinner -->
            <i class="fa fa-spinner fa-spin"></i> <!-- Example spinner icon from Font Awesome -->
        </div>
        <div class="most-popular wire:loading.remove">
            <div class="row">
                <div class="col-lg-12">
                    <div class="heading-section">
                        <h4><em>Search</em> Results</h4>
                    </div>
                    <div class="row">
                        @foreach ($movies as $movie)
                            <div class="col-lg-3 col-sm-6">
                                <div class="item">
                                    <a href="{{ route('movie.single', [$movie['imdbID'], $movie['Title']]) }}">
                                        <img src="{{ $movie['Poster'] }}" alt="" style="height:350px">
                                        <h4>{{ $movie['Title'] }}<br><span>Sandbox</span></h4>
                                        <ul>
                                            <li><i class="fa fa-star"></i> 4.8</li>
                                            <li><i class="fa fa-download"></i> 2.3M</li>
                                        </ul>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @else
        @if (isset($searchInitiated) && $searchInitiated)
            <p>No movies found.</p>
        @else
            @if (!isset($movies) && isset($searchInitiated) && $searchInitiated)
                <div class="loader">
                    <p>Loading movies...</p>
                    <div class="spinner"></div>
                </div>
            @endif
        @endif
    @endif
</div>
