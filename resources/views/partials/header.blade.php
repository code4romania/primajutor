<header>
    <div class="container max-w-full">
        <div class="h-12 bg-bg-gray">
            <div class="container mx-auto flex py-2 sm:px-6">
                <img class="h-8 w-28" src="{{ mix('assets/images/code4ro_head.png') }}">
                <div class="ml-4 self-center font-['Roboto'] text-base">
                    <span>{{ __('txt.header.code_for_romania') }}</span>
                    <a class="ml-2 whitespace-nowrap text-blue-600" href="https://code4.ro/en/donate/" target="_blank"
                        rel="noopener">
                        {{ __('txt.buttons.find_more') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto h-24 sm:px-4">
            <div class="flex h-24 items-center">
                <div class="w-40">
                    <a class="logo-box" href="{{ route('home') }}">
                        <img src="{{ mix('assets/images/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="block cursor-pointer text-3xl md:hidden">
                    <svg class="burger-btn" id="menuTrigger" width="80" height="52" viewBox="0 0 40 26"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect class="burger-btn--1" width="40" height="6" rx="3" ry="3" />
                        <rect class="burger-btn--2" width="40" height="6" y="10" rx="3"
                            ry="3" />
                        <rect class="burger-btn--3" width="40" height="6" y="20" rx="3"
                            ry="3" />
                    </svg>
                </div>
                <div class="flex w-full items-center justify-end" id="sideNav">
                    <div class="flex items-center text-lg font-bold">

                        {{-- ToDo add routes to menu  --}}

                        <a class="mr-10 text-lg font-bold" href="{{ route('home') }}"> {{ __('txt.header.home') }} </a>
                        <a class="mr-10 text-lg font-bold" href="{{ route('home') }}">
                            {{ __('txt.header.about_project') }} </a>
                        <a class="mr-10 text-lg font-bold" href="{{ route('guide.show') }}"> {{ __('txt.header.guides') }}
                        </a>
                        <a class="mr-10 text-lg font-bold" href="{{ route('courses.index') }}"> {{ __('txt.header.courses') }}
                        </a>
                        <a class="mr-10 text-lg font-bold" href="{{ route('courses.index') }}">
                            {{ __('txt.header.contact') }} </a>
                        <a class="mr-10 text-lg font-bold" href="{{ route('courses.index') }}">
                            {{ __('txt.header.sustain') }} </a>
                        @foreach ($pages as $page)
                            @if ($page->show_in_header)
                                <a href="{{ route('page', $page) }}"> {{ $page->title }} </a>
                            @endif
                        @endforeach
                        <a class="button flex h-10 w-32 bg-success-color uppercase"
                            href="https://code4.ro/en/donate/"> {{ __('txt.buttons.donate') }} </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex h-16 items-center justify-center bg-main-color">
            <h4 class="text-3xl font-bold text-white"> {{ __('txt.header.warning_strip') }}</h4>
        </div>
    </div>
</header>
