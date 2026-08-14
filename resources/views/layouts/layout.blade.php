<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>JPL Automotive</title>
    @vite('resources/css/app.css')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>

<body>

    @if(!View::hasSection('hide_header'))
    <header>
        @include('layouts.header')
    </header>
    @endif

    @yield('content')

    <footer>
        @include('layouts.footer')
    </footer>
</body>

</html>
