<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Trung tâm pháp y tâm thần khu vực miền núi phía Bắc')</title>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/lightgallery@2.7.1/css/lightgallery-bundle.min.css">
</head>

<body>
    {{-- header --}}
    @include('partials.app.header')

    {{-- content --}}
    <main>
        @yield('content')
    </main>
    {{-- content --}}

    {{-- footer --}}
    @include('partials.app.footer')
    @stack('scripts')
</body>

</html>
