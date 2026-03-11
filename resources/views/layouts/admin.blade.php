<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Trung tâm pháp y tâm thần khu vực miền núi phía Bắc')</title>
    @vite(['resources/sass/admin.scss', 'resources/js/app.js'])
</head>

<body>
    {{-- navbar --}}
    @include('partials.admin.navbar')

    {{-- sidebar --}}
    @include('partials.admin.sidebar')


    {{-- content --}}
    <main>
        @yield('content')
    </main>
    @yield('scripts')
</body>

</html>
