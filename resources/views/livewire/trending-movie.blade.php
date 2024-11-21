<div class="most-popular">
    <div class="row">
        <div class="col-lg-12">
            <div class="heading-section">
                <h4><em>Most Popular</em> Right Now</h4>
            </div>
            <div class="row">
                @foreach ($moviesData as $item)
                    <div class="col-lg-3 col-sm-6">
                        <div class="item">
                            {{-- {{$item}} --}}
                            <a href="{{ route('movie.single', ['id' => $item['imdbID'], 'name' => $item['Title']]) }}">
                                <img src="{{ $item['Poster'] }}" alt="">
                            </a>
                            <h4
                                style=" white-space: nowrap; text-overflow: ellipsis; width: 150px; overflow: hidden;">
                                {{ $item['Title'] }}<br><span>{{ $item['Genre'] }}</span></h4>
                            <ul>
                                <li><i class="fa fa-star"></i> {{ $item['Rated'] }}</li>
                                <li><i class="fa fa-download"></i> {{ $item['Runtime'] }}</li>
                            </ul>
                        </div>
                    </div>
                @endforeach
                <div class="col-lg-12">
                    <div class="main-button">
                        <a href="#">Discover Popular</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
