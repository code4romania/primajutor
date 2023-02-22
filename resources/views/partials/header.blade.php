<header>
    <div class="container max-w-full">
        <div class="h-12 bg-bg-gray">
            <div class="md:container md:mx-auto flex p-2">
                <img class="h-8 w-28" src="{{ mix('assets/images/code4ro_head.png') }}">
                <div class="font-['Roboto'] text-base md:ml-4 md:self-center">
                    <span class="hidden md:inline">{{ __('txt.header.code_for_romania') }}</span>
                    <a class="ml-2 whitespace-nowrap text-blue-600 " href="https://code4.ro/en/donate/" target="_blank"
                        rel="noopener">
                        {{ __('txt.buttons.find_more') }}
                    </a>
                </div>
            </div>
        </div>

        <div class="container mx-auto h-16 md:h-24">
            <div class="flex  h-16 md:h-24 px-2 items-center justify-between">
                <div class="w-20 md:w-40">
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
                <div class="hidden md:flex w-full items-center justify-end" id="sideNav">
                    <div class="flex items-center text-base lg:text-lg font-bold">

                        {{-- ToDo add routes to menu  --}}

                        <a class="mr-5 lg:mr-10 " href="{{ route('home') }}"> {{ __('txt.header.home') }} </a>
                        <a class="mr-5 lg:mr-10" href="{{ route('home') }}">
                            {{ __('txt.header.about_project') }} </a>
                        <a class="mr-5 lg:mr-10" href="{{ route('guide.show') }}">
                            {{ __('txt.header.guides') }}
                        </a>
                        <a class="mr-5 lg:mr-10" href="{{ route('courses.index') }}">
                            {{ __('txt.header.courses') }}
                        </a>
                        <a class="mr-5 lg:mr-10" href="{{ route('courses.index') }}">
                            {{ __('txt.header.contact') }} </a>
                        <a class="mr-5 lg:mr-10" href="{{ route('courses.index') }}">
                            {{ __('txt.header.sustain') }} </a>
                        @foreach ($pages as $page)
                            @if ($page->show_in_header)
                                <a href="{{ route('page', $page) }}"> {{ $page->title }} </a>
                            @endif
                        @endforeach
                        <a class="button flex h-7 lg:h-10 w-20 lg:w-32 bg-success-color uppercase" href="https://code4.ro/en/donate/">
                            {{ __('txt.buttons.donate') }} </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="flex h-10 items-center justify-center bg-main-color md:h-16">
            <h4 class="text-xl md:text-3xl font-bold text-white"> {{ __('txt.header.warning_strip') }}</h4>
        </div>
    </div>
</header>
