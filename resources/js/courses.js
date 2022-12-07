window.getCities = (placeholder) =>
{
    $.get('cities/' + $('#county-select').val(), function(data, status){
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
    let city = $('#city-select').val() ? $('#city-select').val() : ""
    $.get('courses-list/' + $('#county-select').val() + '/' + city, function(data, status){
        document.getElementById('courses-list').innerHTML = ""
        document.getElementById('courses-list').innerHTML = data.content
    });
}
