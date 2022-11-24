<header class="main-header">
    <div class="container-fluid">
        <div class="container">
            <div class="header-container">
                <div class="header-left">
                    <a href="{{route('home')}}" class="logo-box">
                        <img src="{{asset('images/logo_v2.png')}}" alt="Logo">
                    </a>
                </div>
                <div class="menu-trigger">
                    <svg class="burger-btn" id="menuTrigger" width="80" height="52" viewBox="0 0 40 26" xmlns="http://www.w3.org/2000/svg">
                        <rect class="burger-btn--1" width="40" height="6" rx="3" ry="3" />
                        <rect class="burger-btn--2" width="40" height="6" y="10" rx="3" ry="3" />
                        <rect class="burger-btn--3" width="40" height="6" y="20" rx="3" ry="3" />
                    </svg>
                </div>
                <div class="header-right" id="sideNav">
                    <div class="header-list">
                        <a href="{{route('courses')}}"> {{__('txt.Cursuri Prim Ajutor')}} </a>
                        @foreach($pages as $page)
                            @if($page->show_in_header)
                                <a href="{{route('page', ['alias' => $page->alias])}}"> {{ $page->title }} </a>
                            @endif
                        @endforeach
                        <a href="https://code4.ro/en/donate/" class="text-success"> {{__('txt.Doneaza')}} </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
</header>
