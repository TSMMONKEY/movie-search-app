@extends('layouts.main')

@section('title', 'Single ')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="page-content">

                    <!-- ***** Featured Start ***** -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="feature-banner header-text">
                                <div class="row"
                                    style="margin: 0 auto; text-align: center; display: flex !important; flex-flow: column; align-items: center; align-content: center;">
                                    <div class="col-lg-5">
                                        <img src="{{ $moviesData['Poster'] }}" alt="" style="border-radius: 23px;">
                                    </div>
                                    {{-- <div class="col-lg-8">
                                        <div class="thumb">
                                            <img src="/assets/images/feature-right.jpg" alt=""
                                                style="border-radius: 23px;">
                                            <a href="https://www.youtube.com/watch?v=r1b03uKWk_M" target="_blank"><i
                                                    class="fa fa-play"></i></a>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Featured End ***** -->

                    <!-- ***** Details Start ***** -->
                    <div class="game-details">
                        <div class="row">
                            <div class="col-lg-12">
                                <h2>{{ $moviesData['Title'] }} Details</h2>
                            </div>
                            <div class="col-lg-12">
                                <div class="content">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="left-info">
                                                <div class="left">
                                                    <h4>{{ $moviesData['Title'] }}</h4>
                                                    <span>{{ $moviesData['Genre'] }}</span>
                                                </div>
                                                <ul>
                                                    @foreach ($moviesData['Ratings'] as $rating)
                                                        <li><i class="fa fa-star"></i>{{ $rating['Value'] }}
                                                            ({{ $rating['Source'] }})</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="right-info">
                                                <ul class="text-center">
                                                    <li><i class="fa fa-download"></i> {{ $moviesData['Released'] }}</li>
                                                    <li><i class="fa fa-server"></i> {{ $moviesData['Runtime'] }}</li>
                                                    <li><i class="fa fa-gamepad"></i>Rated: {{ $moviesData['Rated'] }}</li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <p>
                                                {{ $moviesData['Plot'] }}
                                            </p>
                                        </div>
                                        {{-- <div class="col-lg-12">
                                            <div class="main-border-button">
                                                <a href="#">Download {{$moviesData['Title']}} Now!</a>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Details End ***** -->

                    <!-- ***** Other Start ***** -->
                    @livewire('trending-movie')
                    <!-- ***** Other End ***** -->

                </div>
            </div>
        </div>
    </div>
@endsection
