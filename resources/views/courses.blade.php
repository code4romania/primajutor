@extends('layout')

@section('content')
    <main class="app-main">
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <div class="general-field">
                        <label for="searchedCounty"> {{__('txt.placeholders.county')}} </label>
                        <select name="" id="county-select" onchange="getCities()">
                            <option disabled selected> {{__('txt.placeholders.county')}} </option>
                            @foreach($counties as $county)
                                <option value="{{$county->id}}"> {{$county->name}} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="general-field">
                        <label for="searchedLocal"> {{__('txt.placeholders.city')}} </label>
                        <select name="" id="city-select" onchange="getCoursesList()">
                            <option value="" disabled selected> {{__('txt.placeholders.city')}} </option>
                        </select>
                    </div>
                </div>
            </div>
        </section>
        <section class="locations-section">
            <div class="container-fluid">
                <div class="container">
                    <div class="locations-list" id="courses-list">

                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

    <script>

        function getCities()
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
                option.text = "{{__('txt.placeholders.city')}}";

                el.appendChild(option)

                for(i in data){
                    option = document.createElement('option');
                    option.value = i;
                    option.text = data[i];

                    el.appendChild(option)
                }
            });
        }

        function getCoursesList()
        {
            let city = $('#city-select').val() ? $('#city-select').val() : ""
            $.get('courses-list/' + $('#county-select').val() + '/' + city, function(data, status){
                document.getElementById('courses-list').innerHTML = ""
                document.getElementById('courses-list').innerHTML = data.content
            });
        }

    </script>
@endsection
