<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @stack('styles')

    <link rel="shortcut icon" href="{{ asset('img/logo_vertical.png') }}" >

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>

    <title>@yield('title')</title>
</head>
<body>
    <div class="content">
        @yield('content')
    </div>
    
    @include('components.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
    @stack('scripts')
</body>
</html>