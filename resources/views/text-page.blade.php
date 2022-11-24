@extends('layout')

@section('seo_title')  {{$page->seo_title ?? $settings->seo_title}} @endsection
@section('seo_keywords') {{$page->seo_keywords ?? $settings->seo_keywords}} @endsection
@section('seo_description') {{$page->seo_description ?? $settings->seo_description}} @endsection

@section('content')
    <main class="app-main">
        <section class="text-content-section">
            <div class="container-fluid">
                <div class="container">
                    @if(!empty($page->media))
                        <div class="tp-image-container">
                            <div class="el-image-bckg" style="background-image: url('{{$page->getFirstMediaUrl('banner')}}')"></div>
                        </div>
                    @endif
                    <div class="tp-container">
                        <h4> {{ $page->title }} </h4>
{{--                        <span class="tp-art-date">--}}
{{--                            12.05.2022--}}
{{--                        </span>--}}
                        <div class="text-contente-element">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@section('js')

@endsection
