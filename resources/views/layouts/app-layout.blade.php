<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-login-register.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-footer.css') }}" rel="stylesheet">

    <title>@yield('title')</title>
</head>
<body>
    @include('components.header')

    <div class="content">
        @yield('content')
        @include('components.footer')
    </div>

</body>
</html>