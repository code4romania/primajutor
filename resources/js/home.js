var map = null
var markers = []
var myLatLng = { lat: 46.218160, lng: 25.158008 };

window.initMap = () => {

    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });

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



window.seeAll = () =>{
    document.getElementById("js-home-see-all").remove()
    let elems = document.querySelectorAll('.js-topic-link')
    for(let i in elems){
        elems[i].style.display = 'flex';
    }
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
    window.location.href = route('map.localize', { lat, lng })

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
        window.location.href = route('map.localize', { lat, lng })
    });
}

