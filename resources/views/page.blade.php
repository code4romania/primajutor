@extends('layout')

@section('title', $page->title)

@section('content')
    <main class="app-main">
        <div class="bg-gray">
            <div class="container flex py-3 header-global-container">
                <a href="{{ route('home') }}" target="_blank" rel="noopener" class="breadcrumb-link whitespace-nowrap">
                    {{ __('txt.buttons.home') }}
                </a> / {{ $page->title }}
            </div>
        </div>

        <section class="text-content-section">
            <div class="container-fluid">
                <div class="container">
                    @if (!empty($page->media))
                        <div class="tp-image-container">
                            <div class="el-image-bckg"
                                style="background-image: url('{{ $page->getFirstMediaUrl('banner') }}')"></div>
                        </div>
                    @endif
                    <div class="tp-container">
                        <h4>{{ $page->title }}</h4>
                        <div class="text-contente-element">
                            {!! $page->content !!}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
