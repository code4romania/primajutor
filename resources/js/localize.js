var map = null
var myLocation = null
var markers = []
var myLatLng = { lat: 46.218160, lng: 25.158008 };
var directionsService = null;
var directionsDisplay = null;

window.initMap = () => {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });

    directionsService = new google.maps.DirectionsService();
    directionsDisplay = new google.maps.DirectionsRenderer({map: map, suppressMarkers: true, preserveViewport: true});

    if(keyLat && keyLng){
        getHelpPoints(keyLat, keyLng)
    }

    initAutocomplete()
}

function initAutocomplete() {
    var input = document.getElementById('autocomplete');
    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        let lat = place.geometry['location'].lat()
        let lng = place.geometry['location'].lng()
        getHelpPoints(lat, lng)
    });
}

function clearMarkers() {
    if(myLocation){
        myLocation.setMap(null)
    }
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(null);
    }
    markers = []
}

window.navFunc = (lat, lng) => {
    if( (navigator.platform.indexOf("iPhone") != -1)
        || (navigator.platform.indexOf("iPod") != -1)
        || (navigator.platform.indexOf("iPad") != -1))
        window.open("maps://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=" + lat + "," + lng);
    else
        window.open("https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=" + lat + "," + lng);
}

window.getLocation = () => {
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
    getHelpPoints(lat, lng)

    $('#btn-spin').hide()
    $('#btn-txt').show()
    $('#btn-localize').prop('disabled', false)
}

function getHelpPoints(lat, lng)
{
    const url = route('map.points', {
        lat: lat,
        lng: lng,
    });

    $.get(url, function(data, status){
        clearMarkers()
        document.getElementById('location-list').innerHTML = ""
        let points = data.points
        document.getElementById('location-list').innerHTML = data.content
        if(points.length > 0) {
            for(let i in points){
                let marker = new google.maps.Marker({
                    position: { lat: parseFloat(points[i].point.lat), lng: parseFloat(points[i].point.lng) },
                    map
                });
                markers.push(marker)
            }

            markers.push( new google.maps.Marker({
                position: { lat: parseFloat(lat), lng: parseFloat(lng) },
                icon: "http://maps.google.com/mapfiles/kml/paddle/blu-blank-lv.png",
                map,
                title: 'My Location',
            }))

            calculateAndDisplayRoute(directionsService, directionsDisplay, { lat: parseFloat(lat), lng: parseFloat(lng) }, { lat: parseFloat(points[0].point.lat), lng: parseFloat(points[0].point.lng)});

            var bounds = new google.maps.LatLngBounds();
            for (var i = 0; i < markers.length; i++) {
                bounds.extend(markers[i].getPosition());
            }
            map.fitBounds(bounds);

        } else {
            map.setZoom(7)
            map.setCenter(myLatLng)
        }


    });
}

function calculateAndDisplayRoute(directionsService, directionsDisplay, pointA, pointB) {
    directionsService.route({
        origin: pointA,
        destination: pointB,
        avoidHighways: false,
        travelMode: google.maps.TravelMode.WALKING
    }, function (response, status) {
        if (status == google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);
        } else {
            console.log('Directions request failed due to ' + status);
        }
    });
}
