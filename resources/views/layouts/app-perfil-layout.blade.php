<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    @stack('styles')

    <link rel="shortcut icon" href="{{ asset('img/logo_vertical.png') }}">

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-header.css') }}" rel="stylesheet">
    <link href="{{ asset('css/css-footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/global-style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <title>@yield('title')</title>
</head>

<body>
    @include('components.header')
    <div class="content">
        <div class="custom-msg" id="custom-msg">
        </div>
        @yield('content')
    </div>

    @include('components.footer')

    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/global-script.js') }}" ></script>
    @isset($msg)
        @if ($msg != null)
            <script>
                customMsg('{{ $msg[1] }}', '{{ $msg[0] }}')
            </script>
        @endif
    @endisset
    @stack('scripts')
</body>

</html>
