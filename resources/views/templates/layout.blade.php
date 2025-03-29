<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @yield('styles')
</head>
<body>
    @include('templates.header')

    <div class="container">
        @yield('content')
    </div>

    @include('templates.footer')
</body>
</html>
