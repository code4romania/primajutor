@extends('layout')

@section('content')
    <main class="app-main">
        <div class="bg-gray">
            <div class="container flex py-3 header-global-container">
                <a href="{{ route('home') }}" target="_blank" rel="noopener" class="breadcrumb-link whitespace-nowrap">
                    {{ __('txt.buttons.home') }}
                </a> / {{ __('txt.buttons.localize') }}
            </div>
        </div>
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <h4> {{ __('txt.home.top_title') }}</h4>
                    <p> {{ __('txt.home.top_subtitle') }}</p>
                    <div class="search-box">
                        <div class="search-input">
                            <input type="text" placeholder="Cauta oras, strada" id="autocomplete">
                            <i class="fa fa-magnifying-glass"></i>
                        </div>
                        <button class="search-loc-button" onclick="getLocation()" id="btn-localize">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true" id="btn-spin"
                                style="display: none;"></span>
                            <span id="btn-txt">{{ __('txt.buttons.localize') }}</span>
                        </button>
                    </div>
                </div>
                <div class="mapouter">
                    <div class="gmap_canvas" id="map">

                    </div>
                </div>
            </div>
        </section>
        <section class="locations-section">
            <div class="container-fluid">
                <div class="container">
                    <div class="locations-list" id="location-list">

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
        var keyLat = @js($lat);
        var keyLng = @js($lng);
    </script>

    <script src="{{ mix('assets/js/localize.js') }}"></script>
@endsection
