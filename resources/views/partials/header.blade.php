<header>
    <div class="container max-w-full ">
        <div class="bg-bg-gray h-12">
            <div class="container mx-auto sm:px-6 flex py-2">
                <img src="{{ mix('assets/images/code4ro_head.png') }}" class="h-8 w-28">
                <div class="ml-4 self-center text-base font-['Roboto']">
                    <span>{{ __('txt.header.code_for_romania') }}</span>
                    <a href="https://code4.ro/en/donate/" target="_blank" rel="noopener"
                        class="text-blue-600 ml-2 whitespace-nowrap">
                        {{ __('txt.buttons.find_more') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="container mx-auto h-24 sm:px-4">
            <div class="h-24 flex items-center">
                <div class="w-40">
                    <a href="{{ route('home') }}" class="logo-box">
                        <img src="{{ mix('assets/images/logo.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="block  md:hidden text-3xl cursor-pointer">
                    <svg class="burger-btn" id="menuTrigger" width="80" height="52" viewBox="0 0 40 26"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect class="burger-btn--1" width="40" height="6" rx="3" ry="3" />
                        <rect class="burger-btn--2" width="40" height="6" y="10" rx="3"
                            ry="3" />
                        <rect class="burger-btn--3" width="40" height="6" y="20" rx="3"
                            ry="3" />
                    </svg>
                </div>
                <div class="w-full flex justify-end items-center" id="sideNav">
                    <div class="flex  items-center text-lg font-bold">

                        {{-- ToDo add routes to menu  --}}

                        <a href="{{ route('home') }}" class="text-lg font-bold mr-10  "> {{ __('txt.buttons.home') }} </a>
                        <a href="{{ route('home') }}" class="text-lg font-bold mr-10"> {{ __('txt.buttons.about_project') }} </a>
                        <a href="{{ route('home') }}" class="text-lg font-bold mr-10"> {{ __('txt.buttons.guides') }} </a>
                        <a href="{{ route('home') }}"  class="text-lg font-bold mr-10"> {{ __('txt.buttons.courses') }} </a>
                        <a href="{{ route('courses.index') }}" class="text-lg font-bold mr-10"> {{ __('txt.buttons.contact') }} </a>
                        <a href="{{ route('courses.index') }}" class="text-lg font-bold mr-10"> {{ __('txt.buttons.sustain') }} </a>
                        
                        @foreach ($pages as $page)
                            @if ($page->show_in_header)
                                <a href="{{ route('page', $page) }}"> {{ $page->title }} </a>
                            @endif
                        @endforeach

                     
                        
                        <a href="https://code4.ro/en/donate/" class="button w-32 h-10 text-white flex justify-center  items-center  bg-success-color"> {{ __('txt.buttons.donate') }} </a>
                        
                    </div>
                </div>
              
            </div>
        </div>

    </div>
</header>