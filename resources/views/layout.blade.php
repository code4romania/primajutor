<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>@yield('seo_title', $settings->seo_title)</title>
    <meta name="keywords" content="@yield('seo_keywords', $settings->seo_keywords)">
    <meta name="description" content="@yield('seo_description', $settings->seo_description)">

    @yield('head')

    <!-- Bootstrap css -->
    <link href="{{ mix('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css"/>

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ mix('css/main.css') }}">

    <!-- Fontawesome Css -->
    <link href="{{asset('fontawesome/fontawesome-free-6.1.1-web/css/all.css')}}" rel="stylesheet">

    <!-- Bootstrap Js -->
    <script src="{{mix('scripts/bootstrap.bundle.min.js')}}"></script>

    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- App Js -->
    <script src="{{mix('js/app.js')}}"></script>
</head>
<body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</body>
    @yield('js')
    <script>

       let open_menu_trigger = document.getElementById('menuTrigger')
        let side_nav = document.getElementById('sideNav')

        open_menu_trigger.addEventListener('click', () => {
           side_nav.classList.toggle('sidenav-active')
           open_menu_trigger.classList.toggle('active')
        })

    </script>

</html>
