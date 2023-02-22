@extends('layout')

@section('content')
    <main>
        <section class="w-full xl:w-4/5 flex-col" id="guides_list_section">
            <h2 class="title text-2xl md:text-3xl">{{ __('txt.home.guides') }}</h2>
            <div class="flex flex-col md:flex-row md:flex-wrap md:justify-between">
                @foreach ($guides as $guide)
                    <div class="card min-h-min w-full d:w-[48%] lg:w-[32%] flex-col items-center justify-start">
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
