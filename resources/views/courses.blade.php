@extends('layout')

@section('content')
    <main class="app-main">
        <div class="bg-gray">
            <div class="container flex py-3 header-global-container">
                <a href="{{route('home')}}" target="_blank" rel="noopener" class="breadcrumb-link whitespace-nowrap">
                    {{__('txt.buttons.home')}}
                </a> / {{__('txt.buttons.help_courses')}}
            </div>
        </div>
        <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <div class="general-field">
                        <label for="searchedCounty"> {{__('txt.placeholders.county')}} </label>
                        <select name="" id="county-select" onchange="getCities(@js(__('txt.placeholders.city')))">
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
    <script src="{{mix('assets/js/courses.js')}}"></script>
@endsection
