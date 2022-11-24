@extends('layout')

@section('content')
    <main class="app-main">
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <h4> {{__('txt.Localizeaza un punct de prim ajutor langa tine')}} </h4>
                    <p>  {{__('txt.Detalii despre ce sa caute')}}  </p>
                    <div class="search-box">
                        <div class="search-input">
                            <input type="text" placeholder="Cauta oras, strada" id="autocomplete">
                            <i class="fa-solid fa-magnifying-glass"></i>
                        </div>
                        <button class="search-loc-button" onclick="getLocation()" id="btn-localize">
                            <span class="spinner-grow spinner-grow-sm" role="status" aria-hidden="true" id="btn-spin" style="display: none;"></span>
                            <span id="btn-txt">{{__('txt.Localizare')}} </span>
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <section class="emerg-section">
            <div class="emerg-container">
                <h4> {{__('txt.Daca aveti o urgenta sunati la 112')}} </h4>
            </div>
            <div class="fa-container">
                <div class="container">
                    <h4> {{__('txt.Ofera prim ajutor asistat')}} </h4>
                    <div class="cases-accordion">
                        @foreach($helpTopics as $key => $topic)
                            <a href="{{route('helpTopic.detail', $topic->slug)}}" class="case-strip js-topic-link" @if($key > 3) style="display: none;" @endif>
                                <span> {{ $topic->title }} </span>
                                <i class="fa-solid fa-angle-right"></i>
                            </a>
                        @endforeach
                        <p class="see-all" id="js-home-see-all" onclick="seeAll()">
                            <span> {{__('txt.Vezi toate cazurile')}} </span>
                            <i class="fa-solid fa-angle-down"></i>
                        </p>
                    </div>
                </div>
            </div>
            <div class="inside-search-container">
                <div class="search-box-container">
                    <h4> {{__('txt.Descoperă toate punctele de prim ajutor din Romania')}} </h4>
                    <div class="search-box">
                        <a class="search-loc-city-button" href="{{route('map')}}">
                            {{__('txt.Localizare in orasul tau')}}
                        </a>
                    </div>
                </div>
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe id="gmap_canvas" src="https://maps.google.com/maps?q=romania&t=&z=7&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBFTrS57SxNeDrDL85asZT_oz2Me-1j3h8&libraries=places&callback=initAutocomplete" async defer></script>
    <script>
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
