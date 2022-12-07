var map = null
var markers = []
var myLatLng = { lat: 46.218160, lng: 25.158008 };

let helppoints = JSON.parse(document.currentScript.getAttribute('helppoints'))
let cityPlaceholder = document.currentScript.getAttribute('cityplaceholder')

function initMap() {
    map = new google.maps.Map(document.getElementById("map"), {
        zoom: 7,
        center: myLatLng,
    });

    let points = helppoints;

    for(let i in points) {
        let marker = new google.maps.Marker({
            position: { lat: parseFloat(points[i].lat), lng: parseFloat(points[i].lng) },
            map
        });
        markers.push(marker)
    }

}

window.getCities = () =>
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
        option.text = cityPlaceholder;

        el.appendChild(option)

        for(i in data){
            option = document.createElement('option');
            option.value = i;
            option.text = data[i];

            el.appendChild(option)
        }
    });
}

window.getHelpPoints = (showPointsList = false) =>
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
                    map
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

window.navFunc = (lat, lng) => {
    if( (navigator.platform.indexOf("iPhone") != -1)
        || (navigator.platform.indexOf("iPod") != -1)
        || (navigator.platform.indexOf("iPad") != -1))
        window.open("maps://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=" + lat + "," + lng);
    else
        window.open("https://www.google.com/maps/dir/?api=1&travelmode=driving&layer=traffic&destination=" + lat + "," + lng);
}