@extends('layout')

@section('content')
    <main class="app-main">
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <h4> {{ __('txt.home.top_title') }} </h4>
                    <p> {{ __('txt.home.top_subtitle') }} </p>
                    <div class="search-box">
                        <div class="search-input">
                            <input type="text" placeholder="{{ __('txt.placeholders.find_city_street') }}"
                                id="autocomplete">
                            <i class="fa fa-magnifying-glass"></i>
                        </div>
                        <button class="search-loc-button" onclick="getLocation()" id="btn-localize">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true" id="btn-spin"
                                style="display: none;"></span>
                            <span id="btn-txt">{{ __('txt.buttons.localize') }} </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="emerg-section">
            <div class="emerg-container">
                <h4> {{ __('txt.home.warning_strip') }} </h4>
            </div>
            <div class="fa-container">
                <div class="container">
                    <h4> {{ __('txt.home.help_topics_title') }} </h4>
                    <div class="cases-accordion">

                        @foreach ($guides as $guide)
                            <a
                                href="{{ route('guide.show', $guide) }}" class="case-strip js-topic-link"
                                @if ($loop->index > 3) style="display: none;" @endif>
                                <span> {{ $guide->title }} </span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        @endforeach
                        <button class="see-all btn" id="js-home-see-all" onclick="seeAll()">
                            <span> {{ __('txt.buttons.see_all_topics') }} </span>
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
            </div>
            <div class="inside-search-container">
                <div class="search-box-container">
                    <h4> {{ __('txt.home.map_title') }} </h4>
                    <div class="search-box">
                        <a class="search-loc-city-button" href="{{ route('map') }}">
                            {{ __('txt.buttons.localize_in_town') }}
                        </a>
                    </div>
                </div>
                <div class="mapouter">
                    <div class="gmap_canvas" id="map">

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmaps_api_key') }}&libraries=places&callback=initMap"
        async defer></script>

    <script>
        var points = @json($points);
    </script>

    <script src="{{ mix('assets/js/home.js') }}"></script>
@endsection
