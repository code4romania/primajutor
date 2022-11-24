@extends('layout')


@section('seo_title')  {{$helpTopic->seo_title ?? $settings->seo_title}} @endsection
@section('seo_keywords') {{$helpTopic->seo_keywords ?? $settings->seo_keywords}} @endsection
@section('seo_description') {{$helpTopic->seo_description ?? $settings->seo_description}} @endsection

@section('content')
    <main class="app-main">
        <section class="first-aid-steps-section">
            <div class="container-fluid">
                <div class="container">
                    <div class="swiper first-aid-swiper">
                        <div class="swiper-wrapper">
                            @foreach($helpTopic->helpTopicSteps as $step)
                                <div class="swiper-slide">
                                    <div class="swiper-slide-image" style="background-image: url('{{$step->getFirstMediaUrl('banner')}}')"></div>
                                    <div class="swiper-slide-text">
                                        <h3 class="swiper-text-title"> {{ $step->title }} </h3>
                                        <div class="swiper-text-para">
                                             @foreach($step->content as $p)
                                                 <p>{{$p['line']}}</p>
                                             @endforeach
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="swiper-footer">
                            <div class="swiper-button-prev">
                                <i class="fa-solid fa-arrow-left"></i>
                            </div>
                            <div class="swiper-button-next">
                                {{__('txt.Continua')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')
    <script>
        var swiper = new Swiper(".first-aid-swiper", {
            allowTouchMove: false,
            autoHeight: true, //enable auto height
            spaceBetween: 20,
            navigation: {
                nextEl: ".swiper-button-next",
                prevEl: ".swiper-button-prev",
            },
        });

        let open_menu_trigger = document.getElementById('menuTrigger')
        let side_nav = document.getElementById('sideNav')

        open_menu_trigger.addEventListener('click', () => {
            side_nav.classList.toggle('sidenav-active')
            open_menu_trigger.classList.toggle('active')
        })
    </script>
@endsection
