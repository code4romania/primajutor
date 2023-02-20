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
            <h1 class="px-5">Cum procedez în caz de arsură?</h1>
            <div class="card-step px-5 pt-10">
                <div class="mb-10 flex justify-between">
                    <div class="flex w-3/5 flex-col">
                        <h2 class="w-2/3"> {{ __('txt.guide.step') }} 1</h2>
                        <p class="w-4/5 text-2xl leading-9">Lorem Ipsum is simply dummy text of the printing and typesetting
                            industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an
                            unknown printer took a galley of type and scrambled it to make a type specimen book. It has
                            survived not only five centuries, but also the leap into electronic typesetting, remaining
                            essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets
                            containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus
                            PageMaker including versions of Lorem Ipsum.
                        </p>
                    </div>
                    <div class="flex w-2/5 items-center justify-center">
                        <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
                    </div>
                </div>
                <div class="mx-auto mb-10 flex w-4/5 justify-center">
                    <button class="button w-2/5 bg-bg-gray mx-3"> {{ __('txt.buttons.prev_step') }}</button>
                    <button class="button w-2/5 bg-yellow mx-3"> {{ __('txt.buttons.next_step') }}</button>
                </div>
            </div>
        </section>
        <section class="flex-col justify-between" id="step2">
            <h1 class="px-5">Cum procedez în caz de arsură?</h1>
            <div class="card-step px-5 pt-10">
                <div class="mb-10 flex justify-between">
                    <div class="flex w-3/5 flex-col">
                        <h2 class="w-2/3"> {{ __('txt.guide.step') }} 2</h2>
                        <p class="w-4/5 text-2xl leading-9">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.
                        </p>
                        <ul class="ml-10 mb-5 w-4/5 list-disc text-xl leading-9">
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                        </ul>
                        <p class="w-4/5 text-2xl leading-9">
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with.
                        </p>
                    </div>
                    <div class="flex w-2/5 items-center justify-center">
                        <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
                    </div>
                </div>
                <div class="mx-auto mb-10 flex w-4/5 justify-center">
                    <button class="button w-2/5 bg-bg-gray mx-3"> {{ __('txt.buttons.prev_step') }}</button>
                    <button class="button w-2/5 bg-yellow mx-3"> {{ __('txt.buttons.next_step') }}</button>
                </div>
            </div>
        </section>
        <section class="flex-col justify-between" id="step3">
            <h1 class="px-5">Cum procedez în caz de arsură?</h1>
            <div class="card-step px-5 pt-10">
                <div class="mb-10 flex justify-between">
                    <div class="flex w-3/5 flex-col">
                        <h2 class="w-2/3"> {{ __('txt.guide.step') }} 3</h2>
                        <p class="w-4/5 text-2xl leading-9">
                            Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum.
                        </p>
                        <ul class="ml-10 mb-5 w-4/5 list-disc text-xl leading-9">
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                            <li>typesetting, remaining essentially</li>
                        </ul>
                        <p class="w-4/5 text-2xl leading-9">
                            It has survived not only five centuries, but also the leap into electronic typesetting,
                            remaining essentially unchanged. It was popularised in the 1960s with.
                        </p>
                    </div>
                    <div class="flex w-2/5 items-center justify-center">
                        <img src="{{ mix('assets/images/home_hero.png') }}" alt="prim ajutor">
                    </div>
                </div>
                <div class="mx-auto mb-10 flex w-4/5 justify-center">
                    <button class="button w-2/5 bg-bg-gray mx-3"> {{ __('txt.buttons.prev_step') }}</button>
                    <button class="button w-2/5 bg-yellow mx-3"> {{ __('txt.buttons.back_first') }}</button>
                </div>
            </div>
        </section>
        <section class="flex-col" id="other_guides">
            <hr class="mt-10 w-full bg-black">
            <h2 class="mt-8 text-4xl">{{ __('txt.guide.other_guides') }}</h2>
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
            </div>
            </div>
        </section>
        <section class="flex-col" id="list_guides">
            <hr class="mt-10 w-full bg-black">
            <h2 class="mt-8 text-4xl">{{ __('txt.guide.title_list_guides') }}</h2>
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
                    <h4 class="title">Stopul
                        cardio-respirator </h4>
                </div>
                <div class="card min-h-min flex-col items-center justify-start">
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
        qwerty
    </main>
@endsection

@section('js')
    <script src="{{ mix('assets/js/help-topic.js') }}"></script>
@endsection
