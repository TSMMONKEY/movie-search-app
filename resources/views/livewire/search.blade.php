<div>
    <div class="search-input">
        <form id="search">
            <input type="text" placeholder="Type Something" wire:model="search" name="search"/>
            <button type="submit" wire:click.prevent="searchMovie" style="background: transparent; border: none;">
                <i class="fa fa-search"></i>
            </button>
            
            <!-- Error messages -->
            @error('search')
                <br>
                <h4 class="text-danger" style="color: red; font-size: 12px;">{{ $message }}</h4>
            @enderror
            @if(session('movie_not_found'))
                <br>
                <h4 class="text-danger" style="color: red; font-size: 12px;">{{ session('movie_not_found') }}</h4>
            @endif
            @if(session('api_error'))
                <br>
                <h4 class="text-danger" style="color: red; font-size: 12px;">{{ session('api_error') }}</h4>
            @endif
        </form>

        <!-- Loader appears while the action is being processed -->
        <div wire:loading wire:target="searchMovie" class="loader searchLoader">
            <p>Loading...</p> <!-- You can replace this with a spinner -->
            <i class="fa fa-spinner fa-spin"></i> <!-- Example spinner icon from Font Awesome -->
        </div>
    </div>

    <!-- Display search results here -->
    <div wire:loading.remove>
        <!-- Your movie results go here -->
    </div>
</div>
