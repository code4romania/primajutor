@extends('layout')

@section('content')
    <main>
        <section class="bg-bg-gray px-5" id="breadcrumb">
            <div class="container flex py-3">
                <a class="breadcrumb-link whitespace-nowrap" href="{{ route('home') }}" target="_blank" rel="noopener">
                    {{ __('txt.buttons.home') }}
                </a> / {{ __('txt.buttons.help_courses') }}
            </div>
        </section>

        <section class="mx-auto flex flex-col md:flex-row w-4/5 justify-center" id="search-container"">

            <select class="md:mx-1 w-full md:w-1/4 border border-bg-gray p-4 my-1 md:my-0" my-1 md:my-0" id="county-select" name=""
                onchange="getCities(@js(__('txt.placeholders.city')))">
                <option disabled selected> {{ __('txt.placeholders.course_type') }} </option>
                @foreach ($counties as $county)
                    <option value="{{ $county->id }}"> {{ $county->name }} </option>
                @endforeach
            </select>

            <select class="md:mx-1 w-full md:w-1/4 border border-bg-gray p-4 my-1 md:my-0"  id="county-select" name=""
                onchange="getCities(@js(__('txt.placeholders.city')))"ț>
                <option disabled selected> {{ __('txt.placeholders.date_start') }} </option>
                @foreach ($counties as $county)
                    <option value="{{ $county->id }}"> {{ $county->name }} </option>
                @endforeach
            </select>
            <select class="md:mx-1 w-full md:w-1/4 border border-bg-gray p-4 my-1 md:my-0"  id="county-select" name=""
                onchange="getCities(@js(__('txt.placeholders.city')))">>
                <option disabled selected> {{ __('txt.placeholders.county') }} </option>
                @foreach ($counties as $county)
                    <option value="{{ $county->id }}"> {{ $county->name }} </option>
                @endforeach
            </select>
            <button class="button md:mx-3 w-full md:w-2/12 border border-yellow bg-yellow p-4"> {{ __('txt.buttons.search') }}</button>
        </section>
        <section class="w-full xl:w-4/5 flex-col"  id="list_courses">
            <h2 class="title text-2xl md:text-3xl mt-8"> 122 {{ __('txt.course.courses_nr') }}</h2>
                <div class="flex flex-col md:flex-row md:flex-wrap md:justify-between">
                    <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-start justify-start bg-white p-10">
                    <img class="w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
                    <h4 class="my-2 text-xl font-bold">Curs de prim ajutor de bază</h4>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la
                        fața locului</p>
                    <p>{{ __('txt.course.start_date') }} <span class="font-bold">12.03.2023</span> </p>
                    <button
                        class="button my-2 mt-3 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.details') }}</button>
                </div>
                <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-start justify-start bg-white p-10">
                    <img class="w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
                    <h4 class="my-2 text-xl font-bold">Curs de prim ajutor de bază</h4>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la
                        fața locului</p>
                    <p>{{ __('txt.course.start_date') }} <span class="font-bold">12.03.2023</span> </p>
                    <button
                        class="button my-2 mt-3 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.details') }}</button>
                </div>
                <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-start justify-start bg-white p-10">
                    <img class="w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
                    <h4 class="my-2 text-xl font-bold">Curs de prim ajutor de bază</h4>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la
                        fața locului</p>
                    <p>{{ __('txt.course.start_date') }} <span class="font-bold">12.03.2023</span> </p>
                    <button
                        class="button my-2 mt-3 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.details') }}</button>
                </div>
                <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-start justify-start bg-white p-10">
                    <img class="w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
                    <h4 class="my-2 text-xl font-bold">Curs de prim ajutor de bază</h4>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la
                        fața locului</p>
                    <p>{{ __('txt.course.start_date') }} <span class="font-bold">12.03.2023</span> </p>
                    <button
                        class="button my-2 mt-3 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.details') }}</button>
                </div>
                <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-start justify-start bg-white p-10">
                    <img class="w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
                    <h4 class="my-2 text-xl font-bold">Curs de prim ajutor de bază</h4>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la
                        fața locului</p>
                    <p>{{ __('txt.course.start_date') }} <span class="font-bold">12.03.2023</span> </p>
                    <button
                        class="button my-2 mt-3 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.details') }}</button>
                </div>
                <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-start justify-start bg-white p-10">
                    <img class="w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p class="my-2"> <i class="fa-regular fa-location-dot"></i> București</p>
                    <h4 class="my-2 text-xl font-bold">Curs de prim ajutor de bază</h4>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la
                        fața locului</p>
                    <p>{{ __('txt.course.start_date') }} <span class="font-bold">12.03.2023</span> </p>
                    <button
                        class="button my-2 mt-3 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.details') }}</button>
                </div>
            </div>
            <nav class="my-5 flex w-full md:w-2/3 justify-between self-center" id="pagination">
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded" href="#">&laquo;</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  href="#">1</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  class="active" href="#">2</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  href="#">3</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  href="#">4</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  href="#">...</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  href="#">N</a>
                <a class="text-xl font-bold hover:bg-yellow hover:no-underline px-3 border rounded"  href="#">&raquo;</a>
            </nav>
        </section>

        qwerty
        <a class="bg-main-color" href="http://primajutor.mk/ghid/et-mollitia-quisquam-ut-incidunt-eius-reiciendis-ex">Ghiduri</a>

        {{-- <section class="hero-section">
            <div class="container-fluid">
                <div class="search-box-container">
                    <div class="general-field">
                        <label for="searchedCounty"> {{ __('txt.placeholders.county') }} </label>
                        <select id="county-select" name="" onchange="getCities(@js(__('txt.placeholders.city')))">
                            <option disabled selected> {{ __('txt.placeholders.county') }} </option>
                            @foreach ($counties as $county)
                                <option value="{{ $county->id }}"> {{ $county->name }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="general-field">
                        <label for="searchedLocal"> {{ __('txt.placeholders.city') }} </label>
                        <select id="city-select" name="" onchange="getCoursesList()">
                            <option value="" disabled selected> {{ __('txt.placeholders.city') }} </option>
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
        </section> --}}
    </main>
@endsection

@section('js')
    <script src="{{ mix('assets/js/courses.js') }}"></script>
@endsection
