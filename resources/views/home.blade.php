@extends('layout')

@section('content')
    <main class="pb-96">
        <section class="container mx-auto flex justify-between" id="hero-section">
            <div class="flex w-3/5 flex-col pl-8 pt-4">
                <h1 class="w-2/3"> {{ __('txt.home.hero_title') }} </h1>
                <p class="w-2/3 text-2xl leading-9"> {{ __('txt.home.hero_text') }} </p>
            </div>
            <div class="w-2/5">
                <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
            </div>
        </section>
        <section class="flex flex-col" id="emerg-section">
            <div class="mx-auto w-4/5">
                <div class="flex h-20 items-center">
                    <div class="w-3/4">
                        <input id="autocomplete" type="text" placeholder="{{ __('txt.placeholders.find_address') }}"
                            class="''> <i class= w-full border border-bg-gray bg-transparent p-6 text-lg duration-300 ease-in-out focus:outline-none"fa
                            fa-magnifying-glass translate-y-4"></i>
                    </div>
                    <button class="button h-full w-1/4 bg-main-color text-xl" id="btn-localize" onclick="getLocation()">
                        <i class="fa-regular fa-location-dot"></i>
                        <span class="spinner-grow spinner-grow-sm" id="btn-spin" role="status" aria-hidden="true"
                            style="display: none;"></span>
                        <span id="btn-txt">{{ __('txt.buttons.localize') }} </span>
                    </button>
                </div>
            </div>
            <div class="my-10 h-[40rem] w-full rounded-lg border border-main-color">
                <div class="h-full w-full overflow-hidden" id="map">

                </div>
            </div>
            <div class="my-10 flex h-[40rem] w-full rounded-lg border border-main-color">
                <div class="h-full w-2/3 overflow-hidden" id="map">

                </div>
                <div class="flex h-full w-1/3 flex-col overflow-hidden p-10" id="map_result">
                    <span class="h-5 w-5">x</span>
                    <img class="my-5 w-20" src="{{ mix('assets/images/suitcase-icon.png') }}">
                    <p> <i class="fa-regular fa-location-dot"></i> Calea Bucurestilor, 24, Otopeni, Ilfov</p>
                    <h4 class="my-2 text-xl font-bold"> Aeroport Henri Coandă</h4>
                    <div class="my-4">
                        <p>
                            <img class="my-2 mr-2 inline w-5" src="{{ mix('assets/images/ok-icon.png') }}">
                            <span>{{ __('txt.map.permanent') }}</span>
                        </p>
                        <p>
                            <img class="my-2 mr-2 inline w-5" src="{{ mix('assets/images/direction-icon.png') }}">
                            <span> 0, 5 {{ __('txt.map.distance') }}</span>
                        </p>
                    </div>
                    <button class="button w-full h-12 text-black font-bold bg-yellow my-2">{{ __('txt.buttons.directions') }}</button>
                    <p>Defibrilator disponibil în interiorul aeroportului. Solicitați ajutor din partea personalului de la fața locului</p>
                    <p>{{ __('txt.map.type') }} <span class="font-bold">Defibrilator</span> </p>
                </div>
                </div>
            <div class="container h-16 bg-bg-gray" id="cta_add_def">
                <p>CTA Adaugare defibrilator</p>
            </div>
        </section>
        <section class="w-3/4 flex-col" id="guides_list_section">
            <h2 class="title">{{ __('txt.home.guides') }}</h2>
            <div class="flex flex-wrap justify-between">
                <div class="card min-h-min flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Stopul
                        cardio-respirator </h4>
                </div>
                <div class="card min-h-min flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Persoană
                        inconștientă</h4>
                </div>
                <div class="card min-h-min flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Șoc
                        anafilactic</h4>
                </div>
                <div class="card min-h-min flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Înecare</h4>
                </div>
                <div class="card min-h-min flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Arsură</h4>
                </div>
                <div class="card min-h-min flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Alt ghid</h4>
                </div>
            </div>
            {{-- <div class="fa-container">
                <div class="container mx-auto sm:px-4">
                    <h4> {{ __('txt.home.help_topics_title') }} </h4>
                    <div class="cases-accordion">

                        @foreach ($guides as $guide)
                            <a class="case-strip js-topic-link" href="{{ route('guide.show', $guide) }}"
                                @if ($loop->index > 3) style="display: none;" @endif>
                                <span> {{ $guide->title }} </span>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        @endforeach
                        <button
                            class="see-all whitespace-no-wrap inline-block select-none rounded border py-1 px-3 text-center align-middle font-normal leading-normal no-underline"
                            id="js-home-see-all" onclick="seeAll()">
                            <span> {{ __('txt.buttons.see_all_topics') }} </span>
                            <i class="fa fa-angle-down"></i>
                        </button>
                    </div>
                </div>
            </div> --}}
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
