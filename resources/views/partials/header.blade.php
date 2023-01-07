<header class="main-header">
    <div class="container-fluid">
        <div class="bg-gray">
            <div class="container flex py-3 header-global-container">
                <img src="{{ mix('assets/images/commitglobal.svg') }}">
                <div class="ml-3 text-sm font-medium">
                    <span>{{ __('txt.header.commit_global') }}</span>
                    <a href="https://www.commitglobal.org" target="_blank" rel="noopener"
                        class="text-blue-600 hover:underline whitespace-nowrap">
                        {{ __('txt.buttons.find_more') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="header-container">
                <div class="header-left">
                    <a href="{{ route('home') }}" class="logo-box">
                        <img src="{{ mix('assets/images/logo_v2.png') }}" alt="Logo">
                    </a>
                </div>
                <div class="menu-trigger">
                    <svg class="burger-btn" id="menuTrigger" width="80" height="52" viewBox="0 0 40 26"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect class="burger-btn--1" width="40" height="6" rx="3" ry="3" />
                        <rect class="burger-btn--2" width="40" height="6" y="10" rx="3"
                            ry="3" />
                        <rect class="burger-btn--3" width="40" height="6" y="20" rx="3"
                            ry="3" />
                    </svg>
                </div>
                <div class="header-right" id="sideNav">
                    <div class="header-list">
                        <a href="{{ route('courses.index') }}"> {{ __('txt.buttons.help_courses') }} </a>
                        @foreach ($pages as $page)
                            @if ($page->show_in_header)
                                <a href="{{ route('page', $page) }}"> {{ $page->title }} </a>
                            @endif
                        @endforeach
                        <a href="https://code4.ro/en/donate/" class="text-success"> {{ __('txt.buttons.donate') }} </a>
                        <div class="lang-list-item">
                            @if (app()->getLocale() == 'ro')
                                <a href="javascript:void(0)" class="lang-selected-link">
                                    <span> Ro </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            @elseif(app()->getLocale() == 'en')
                                <a href="javascript:void(0)" class="lang-selected-link">
                                    <span> En </span>
                                    <i class="fa fa-angle-down"></i>
                                </a>
                            @endif
                            <div class="lang-dropdown">
                                <a href="{{ route('setLocale', 'ro') }}" class="lang-dropdown-item">
                                    <span>Ro</span>
                                </a>
                                <a href="{{ route('setLocale', 'en') }}" class="lang-dropdown-item">
                                    <span>En</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
