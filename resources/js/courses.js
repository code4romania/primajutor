window.getCities = (placeholder) =>
{
    const url = route('map.citiesInCounty', {
        county: $('#county-select').val(),
    });

    $.get(url, function(data, status){
        getCoursesList()
        let option = null;
        let el = document.getElementById('city-select')
        el.innerHTML = ""

        option = document.createElement('option');
        option.value = "";
        option.disabled = true;
        option.selected = true;
        option.text = placeholder;

        el.appendChild(option)

        for(i in data){
            option = document.createElement('option');
            option.value = i;
            option.text = data[i];

            el.appendChild(option)
        }
    });
}

window.getCoursesList = () =>
{
    const url = route('courses.search', {
        county: $('#county-select').val(),
        city: $('#city-select').val(),
    });

    $.get(url, function(data, status){
        document.getElementById('courses-list').innerHTML = data.content
    });
}
