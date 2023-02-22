@extends('layout')

@section('content')
    <main>
        <section class="container mx-auto flex flex-col md:flex-row md:justify-between" id="hero-section">
            <div class="flex w-full flex-col md:w-3/5 md:pl-8 md:pt-4">
                <h1 class="w-full text-2xl md:w-2/3 md:text-4xl"> {{ __('txt.home.hero_title') }} </h1>
                <p class="w-full text-xl leading-6 md:w-2/3 md:text-2xl md:leading-9"> {{ __('txt.home.hero_text') }} </p>
            </div>
            <div class="flex w-full items-center md:w-2/5">
                <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
            </div>
        </section>

        <section class="flex flex-col" id="emerg-section">
            <div class="mx-auto w-4/5 mb-20 md:mb-0">
                <div class="flex h-10 flex-col items-center md:h-20 md:flex-row">
                    <div class="w-full md:w-3/4 mb-5 md:mb-0">
                        <input id="autocomplete" type="text" placeholder="{{ __('txt.placeholders.find_address') }}"
                               class="w-full border border-bg-gray bg-transparent p-3 md:p-6  text-base md:text-lg duration-300 ease-in-out focus:outline-none"></i>
                    </div>
                    <div class="button h-full md:w-1/4 bg-main-color w-full md:text-xl text-base" id="btn-localize"
                            onclick="getLocation()">
                        <i class="fa-map-marker-alt"></i>
                        <span class="spinner-grow spinner-grow-sm" id="btn-spin" role="status" aria-hidden="true"
                              style="display: none;"></span>
                        <span id="btn-txt">{{ __('txt.buttons.localize') }} </span>
                    </div>
                </div>
            </div>
            <div class="my-10 h-96 md:h-[40rem] w-full rounded-lg border border-main-color">
                <div class=" h-full w-full overflow-hidden" id="map">

                </div>
            </div>
{{--            <div class="my-10 flex flex-col md:flex-row md:h-[40rem] w-full rounded-lg border border-main-color ">--}}
{{--                <div class="h-96 md:h-full w-full md:w-2/3 overflow-hidden" id="map-2">--}}

{{--                </div>--}}
{{--                <div class="flex md:h-full w-full md:w-1/3 flex-col overflow-hidden p-10" id="map_result">--}}
{{--                    <span class="h-5 w-5">x</span>--}}
{{--                    <img class="my-5 w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">--}}
{{--                    <p><i class="fa-regular fa-location-dot"></i> Calea Bucurestilor, 24, Otopeni, Ilfov</p>--}}
{{--                    <h4 class="my-2 text-xl font-bold"> Aeroport Henri Coandă</h4>--}}
{{--                    <div class="my-4">--}}
{{--                        <p>--}}
{{--                            <img class="my-2 mr-2 inline w-5" src="{{ mix('assets/images/ok-icon.png') }}">--}}
{{--                            <span>{{ __('txt.map.permanent') }}</span>--}}
{{--                        </p>--}}
{{--                        <p>--}}
{{--                            <img class="my-2 mr-2 inline w-5" src="{{ mix('assets/images/direction-icon.png') }}">--}}
{{--                            <span> 0, 5 {{ __('txt.map.distance') }}</span>--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <button--}}
{{--                        class="button my-2 h-12 w-full bg-yellow font-bold text-black">{{ __('txt.buttons.directions') }}</button>--}}
{{--                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de--}}
{{--                        la--}}
{{--                        fața locului</p>--}}
{{--                    <p>{{ __('txt.map.type') }} <span class="font-bold">Defibrilator</span></p>--}}
{{--                </div>--}}
{{--            </div>--}}
            <div class="container h-16 bg-bg-gray">
                <button  class="button">{{__('txt.buttons.add_point')}}</button>
            </div>
        </section>

        <section class="w-full xl:w-4/5 flex-col" id="guides_list_section">
            <h2 class="title text-2xl md:text-3xl">{{ __('txt.home.guides') }}</h2>
            <div class="flex flex-col md:flex-row md:flex-wrap md:justify-between">
                @foreach ($guides as $guide)
                    <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]  flex-col items-center justify-start">
                        <a href="{{ route('guide.show', $guide) }}">
                            <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                            <h4 class="title"> {{ $guide->title }} </h4>
                        </a>
                    </div>
                @endforeach
            </div>

        </section>
    </main>
@endsection

@section('js')
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('app.gmaps_api_key') }}&libraries=places&callback=initMap"
        async defer></script>
    <script>
        var points = @json($points);
    </script>

    <script src="{{ mix('assets/js/home.js') }}"></script>
@endsection
