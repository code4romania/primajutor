@extends('layout')

@section('content')
    <main class="app-main">
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <div class="general-field">
                        <label for="searchedCounty"> {{__('txt.Judet')}} </label>
                        <select name="" id="county-select" onchange="getCities()">
                            <option disabled selected> {{__('txt.Judet')}} </option>
                            @foreach($counties as $county)
                                <option value="{{$county->id}}"> {{$county->name}} </option>
                            @endforeach
                        </select>
                        <!-- <input type="text" placeholder="Cauta judet" id="searchedCounty"> -->
                    </div>
                    <div class="general-field">
                        <label for="searchedLocal"> {{__('txt.Localitate')}} </label>
                        <select name="" id="city-select" onchange="getHelpPoints(true)">
                            <option value="" disabled selected> {{__('txt.Localitate')}} </option>
                        </select>
                        <!-- <input type="text" placeholder="Cauta oras" id="searchedLocal"> -->
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
    <script src="https://maps.googleapis.com/maps/api/js?key={{config('app.gmaps_api_key')}}&callback=initMap" async defer></script>

    <script>
        var map = null
        var markers = []
        var myLatLng = { lat: 46.218160, lng: 25.158008 };

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: myLatLng,
            });

            let points = @json($helpPoints)

            for(let i in points) {
                let marker = new google.maps.Marker({
                    position: { lat: parseFloat(points[i].lat), lng: parseFloat(points[i].lng) },
                    map,
                    title: points[i].title,
                });
                markers.push(marker)
            }

        }

        window.initMap = initMap;

        function getCities()
        {
            $.get('cities/' + $('#county-select').val(), function(data, status){
                getHelpPoints()
                let option = null;
                let el = document.getElementById('city-select')
                el.innerHTML = ""

                option = document.createElement('option');
                option.value = "";
                option.disabled = true;
                option.selected = true;
                option.text = "{{__('txt.Localitate')}}";

                el.appendChild(option)

                for(i in data){
                    option = document.createElement('option');
                    option.value = i;
                    option.text = data[i];

                    el.appendChild(option)
                }
            });
        }

        function getHelpPoints(showPointsList = false)
        {
            let city = $('#city-select').val() ? $('#city-select').val() : ""
            $.get('help-points/' + $('#county-select').val() + '/' + city, function(data, status){
                clearMarkes()
                document.getElementById('location-list').innerHTML = ""
                let points = data.points
                if(showPointsList){
                    document.getElementById('location-list').innerHTML = data.content
                }
                if(points.length > 0) {
                    for(let i in points){
                        let marker = new google.maps.Marker({
                            position: { lat: parseFloat(points[i].lat), lng: parseFloat(points[i].lng) },
                            map,
                            title: points[i].title,
                        });
                        markers.push(marker)
                    }
                    var bounds = new google.maps.LatLngBounds();
                    for (var i = 0; i < markers.length; i++) {
                        bounds.extend(markers[i].getPosition());
                    }

                    map.fitBounds(bounds, 100);
                } else {
                    map.setZoom(7)
                    map.setCenter(myLatLng)
                }

            });
        }

        function clearMarkes() {
            for (var i = 0; i < markers.length; i++) {
                markers[i].setMap(null);
            }
            markers = []
        }

        function navFunc(lat, lng){
            if( (navigator.platform.indexOf("iPhone") != -1)
                || (navigator.platform.indexOf("iPod") != -1)
                || (navigator.platform.indexOf("iPad") != -1))
                 window.open("maps://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=" + lat + "," + lng);
            else
                 window.open("https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=" + lat + "," + lng);
        }

    </script>
@endsection
