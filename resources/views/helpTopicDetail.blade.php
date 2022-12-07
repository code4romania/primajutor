@extends('layout')


@section('seo_title')  {{$helpTopic->seo_title ?? $settings->seo_title}} @endsection
@section('seo_keywords') {{$helpTopic->seo_keywords ?? $settings->seo_keywords}} @endsection
@section('seo_description') {{$helpTopic->seo_description ?? $settings->seo_description}} @endsection

@section('content')
    <main class="app-main">
        <div class="bg-gray">
            <div class="container flex py-3 header-global-container">
                <a href="{{route('home')}}" target="_blank" rel="noopener" class="breadcrumb-link whitespace-nowrap">
                    {{__('txt.buttons.home')}}
                </a> / {{__('txt.home.help_topics_title')}}
            </div>
        </div>
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
                                {{__('txt.buttons.continue')}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

    <script src="{{mix('assets/js/help-topic.js')}}"></script>
@endsection
