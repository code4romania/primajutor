@extends('layout')

@section('content')
    <main class="app-main">
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <h4> {{__('txt.home.top_title')}} </h4>
                    <p>  {{__('txt.home.top_subtitle')}}  </p>
                    <div class="search-box">
                        <div class="search-input">
                            <input type="text" placeholder="{{__('txt.placeholders.find_city_street')}}" id="autocomplete">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <button class="search-loc-button" onclick="getLocation()" id="btn-localize">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true" id="btn-spin" style="display: none;"></span>
                            <span id="btn-txt">{{__('txt.buttons.localize')}} </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="emerg-section">
            <div class="emerg-container">
                <h4> {{__('txt.home.warning_strip')}} </h4>
            </div>
            <div class="fa-container">
                <div class="container">
                    <h4> {{__('txt.home.help_topics_title')}} </h4>
                    <div class="cases-accordion">
                        @foreach($helpTopics as $key => $topic)
                            <a href="{{route('helpTopic.detail', $topic->slug)}}" class="case-strip js-topic-link" @if($key > 3) style="display: none;" @endif>
                                <span> {{ $topic->title }} </span>
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        @endforeach
                        <p class="see-all" id="js-home-see-all" onclick="seeAll()">
                            <span> {{__('txt.buttons.see_all_topics')}} </span>
                            <i class="fa-solid fa-angle-down"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="inside-search-container">
                <div class="search-box-container">
                    <h4> {{__('txt.home.map_title')}} </h4>
                    <div class="search-box">
                        <a class="search-loc-city-button" href="{{route('map')}}">
                            {{__('txt.buttons.localize_in_town')}}
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('app.gmaps_api_key')}}&libraries=places&callback=initMap" async defer></script>
    <script>

        var map = null
        var markers = []
        var myLatLng = { lat: 46.218160, lng: 25.158008 };

        function initMap() {

            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: myLatLng,
            });

            let points = @json($helpPointsArr);
            for(let i in points){
                let marker = new google.maps.Marker({
                    position: { lat: parseFloat(points[i].lat), lng: parseFloat(points[i].lng) },
                    map,
                    title: points[i].title,
                });
                markers.push(marker)
            }

            initAutocomplete()
        }



        function seeAll(){
            document.getElementById("js-home-see-all").remove()
            let elems = document.querySelectorAll('.js-topic-link')
            for(let i in elems){
                elems[i].style.display = 'flex';
            }
        }

        function getLocation() {
            $('#btn-spin').show();
            $('#btn-txt').hide();
            $('#btn-localize').prop('disabled', true)
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(showPosition);
            }
        }

        function showPosition(position) {
            let lat = position.coords.latitude
            let lng = position.coords.longitude
            window.location.href = "localizare?lat=" +lat + "&lng=" + lng

            $('#btn-spin').hide()
            $('#btn-txt').show()
            $('#btn-localize').prop('disabled', false)
        }

        function initAutocomplete() {
            var input = document.getElementById('autocomplete');
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.addListener('place_changed', function () {
                var place = autocomplete.getPlace();
                let lat = place.geometry['location'].lat()
                let lng = place.geometry['location'].lng()
                window.location.href = "localizare?lat=" +lat + "&lng=" + lng
            });
        }
    </script>
@endsection
