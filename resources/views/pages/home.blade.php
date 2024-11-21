@extends('layouts.main')

@section('title', 'home')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    @livewire('search-results')

                    <!-- ***** Banner Start ***** -->
                    <div class="main-banner">
                        <div class="row">
                            <div class="col-lg-7">
                                <div class="header-text">
                                    <h6>Welcome To Cyborg</h6>
                                    <h4><em>Browse</em> Our Trending Movies Here</h4>
                                    <div class="main-button">
                                        <a href="#">Browse Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Banner End ***** -->
                    <div>

                    </div>

                    <!-- ***** Most Popular Start ***** -->
                    

                    <!-- ***** Most Popular End ***** -->
                    @livewire('trending-movie')
                </div>
            </div>
        </div>
    </div>
@endsection
