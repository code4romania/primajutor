@extends('layout')

@section('title', $guide->title)

@section('content')
    <main>
        <section class="bg-bg-gray px-5" id="breadcrumb">
            <div class="container flex py-3">
                <a class="breadcrumb-link whitespace-nowrap" href="{{ route('home') }}" target="_blank" rel="noopener">
                    {{ __('txt.buttons.home') }}
                </a> / {{ __('txt.home.help_topics_title') }}
            </div>
        </section>
        <section class="flex-col justify-between" id="step1">
            <h1 class="w-full text-2xl md:w-2/3 md:text-4xl">Cum procedez în caz de arsură?</h1>
            <div class="card-step flex flex-col px-5 pt-10 ">
                <div class="mb-10 flex w-full flex-col justify-between md:flex-row">
                    <div class="flex w-full flex-col md:w-3/5">
                        <h2 class="w-full text-xl md:w-2/3 md:text-2xl"> {{ __('txt.guide.step') }} 1</h2>
                        <p class="text-x d:w-4/5 w-full leading-6 md:text-2xl md:leading-9">Lorem Ipsum is simply dummy text
                            of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                            PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="flex w-full items-center justify-center md:w-2/5">
                        <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
                    </div>
                </div>
                <div class="mx-auto mb-10 flex w-full justify-center md:w-4/5">
                    <button class="button m-2 w-2/5 bg-bg-gray text-sm md:mx-3 md:text-base">
                        {{ __('txt.buttons.prev_step') }}</button>
                    <button class="button m-2 w-2/5 bg-yellow text-sm md:mx-3 md:text-base">
                        {{ __('txt.buttons.next_step') }}</button>
                </div>
            </div>
        </section>
        <section class="flex-col justify-between" id="step2">
            <h1 class="w-full text-2xl md:w-2/3 md:text-4xl">Cum procedez în caz de arsură?</h1>
            <div class="card-step flex flex-col px-5 pt-10 ">
                <div class="mb-10 flex w-full flex-col justify-between md:flex-row">
                    <div class="flex w-full flex-col md:w-3/5">
                        <h2 class="w-full text-xl md:w-2/3 md:text-2xl"> {{ __('txt.guide.step') }} 2</h2>
                        <p class="w-full md:w-4/5 text-xl leading-6 md:text-2xl md:leading-9">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.
                        </p>
                        <ul class="ml-10 my-5 list-disc w-full md:w-4/5 text-base leading-6 md:text-xl md:leading-9">
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                        </ul>
                        <p class="w-full md:w-4/5 text-xl leading-6 md:text-2xl md:leading-9">
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with.
                        </p>
                    </div>
                    <div class="flex w-full items-center justify-center md:w-2/5">
                        <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
                    </div>
                </div>
                <div class="mx-auto mb-10 flex w-full justify-center md:w-4/5">
                    <button class="button m-2 w-2/5 bg-bg-gray text-sm md:mx-3 md:text-base">
                        {{ __('txt.buttons.prev_step') }}</button>
                    <button class="button m-2 w-2/5 bg-yellow text-sm md:mx-3 md:text-base"> {{ __('txt.buttons.next_step') }}</button>
                </div>
            </div>
        </section>
        <section class="flex-col justify-between" id="step2">
            <h1 class="w-full text-2xl md:w-2/3 md:text-4xl">Cum procedez în caz de arsură?</h1>
            <div class="card-step flex flex-col px-5 pt-10 ">
                <div class="mb-10 flex w-full flex-col justify-between md:flex-row">
                    <div class="flex w-full flex-col md:w-3/5">
                        <h2 class="w-full text-xl md:w-2/3 md:text-2xl"> {{ __('txt.guide.step') }} 3</h2>
                        <p class="w-full md:w-4/5 text-xl leading-6 md:text-2xl md:leading-9">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.
                        </p>
                        <ul class="ml-10 my-5 list-disc w-full md:w-4/5 text-base leading-6 md:text-xl md:leading-9">
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                        </ul>
                        <p class="w-full md:w-4/5 text-xl leading-6 md:text-2xl md:leading-9">
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with.
                        </p>
                    </div>
                    <div class="flex w-full items-center justify-center md:w-2/5">
                        <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
                    </div>
                </div>
                <div class="mx-auto mb-10 flex w-full justify-center md:w-4/5">
                    <button class="button m-2 w-2/5 bg-bg-gray text-sm md:mx-3 md:text-base">
                        {{ __('txt.buttons.prev_step') }}</button>
                    <button class="button m-2 w-2/5 bg-yellow text-sm md:mx-3 md:text-base"> {{ __('txt.buttons.next_step') }}</button>
                </div>
            </div>
        </section>
        <section class="w-full xl:w-4/5 flex-col" id="other_guides">
            <hr class="mt-10 w-full bg-black">
            <h2  class="w-full text-2xl md:w-2/3 md:text-3xl mt-8">{{ __('txt.guide.other_guides') }}</h2>
            <div class="flex flex-col md:flex-row md:flex-wrap md:justify-between">
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%] flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Stopul
                        cardio-respirator </h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%] flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Persoană
                        inconștientă</h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%] flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Șoc
                        anafilactic</h4>
                </div>
            </div>
            </div>
        </section>
        <section class="w-full xl:w-4/5 flex-col" id="list_guides">
            <hr class="mt-10 w-full bg-black">
            <h2  class="w-full text-2xl md:w-2/3 md:text-3xl mt-8">{{ __('txt.guide.title_list_guides') }}</h2>
            <div class="flex flex-col md:flex-row md:flex-wrap md:justify-between">
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Stopul
                        cardio-respirator </h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Persoană
                        inconștientă</h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Șoc
                        anafilactic</h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Stopul
                        cardio-respirator </h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Persoană
                        inconștientă</h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Șoc
                        anafilactic</h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Stopul
                        cardio-respirator </h4>
                </div>
               <div class="card min-h-min w-full md:w-[48%] lg:w-[32%]   flex-col items-center justify-start">
                    <img class="w-1/3" src="{{ mix('assets/images/guide_card_logo.png') }}" alt="guide">
                    <h4 class="title">Persoană
                        inconștientă</h4>
                </div>

            </div>
            </div>
        </section>

        {{-- <section class="first-aid-steps-section">
            <div class="container-fluid">
                <div class="container">
                    <div class="swiper first-aid-swiper">
                        <div class="swiper-wrapper">
                            @foreach ($guide->steps as $step)
                                <div class="swiper-slide">
                                    <div class="swiper-slide-image"
                                        style="background-image: url('{{ $step->getFirstMediaUrl('banner') }}')"></div>
                                    <div class="swiper-slide-text">
                                        <h3 class="swiper-text-title">{{ $loop->iteration }}. {{ $step->title }} </h3>
                                        <div class="swiper-text-para">
                                            {!! $step->content !!}
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-footer">
                            <div class="swiper-button-prev">
                                <i class="fa fa-arrow-left"></i>
                            </div>
                            <div class="swiper-button-next">
                                {{ __('txt.buttons.continue') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section> --}}
    </main>
@endsection

@section('js')
    <script src="{{ mix('assets/js/help-topic.js') }}"></script>
@endsection
