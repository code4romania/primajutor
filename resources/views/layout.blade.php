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

    <!-- Custom Css -->
    <link rel="stylesheet" href="{{ mix('assets/css/main.css') }}">

</head>
<body>

    @include('partials.header')

    @yield('content')

    @include('partials.footer')
</body>

    <script src="{{mix('assets/js/app.js')}}"></script>
    @yield('js')

</html>
