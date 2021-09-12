@extends('layouts.app-enter-user')

@section('content')
    <form method="POST" action="{{ route('loginLibrary') }}" id="form" autocomplete="off">
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                LOGIN
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <div class="tcc-form-control {{ $errors->has('cnpj') ? 'tcc-is-invalid' : '' }}">
                    <input id="cnpj" type="text" name="cnpj" value="{{ old('cnpj') }}" autocomplete="off"
                        placeholder=" ">
                    <label for="cnpj">CNPJ</label>
                </div>
                @if ($errors->has('cnpj'))
                    <div class="tcc-invalid-feedback">
                        <span>
                            {{ $errors->first('cnpj') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <div class="tcc-form-control {{ $errors->has('password') ? 'tcc-is-invalid' : '' }}">
                    <input id="password" type="password" name="password" value="{{ old('password') }}" autocomplete="off"
                        placeholder=" ">
                    <label for="password">Senha</label>
                </div>
                @if ($errors->has('password'))
                    <div class="tcc-invalid-feedback">
                        <span>
                            {{ $errors->first('password') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <!-- Remember Me -->
        <div class="block mt-2">
            <div>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('registerLibrary') }}">
                    Registre-se aqui
                </a>
                <br>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    Logar-se como Usuário
                </a>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-login text-white mx-auto">
                    Login
                </button>
        </div>
    </form>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush

@push('scripts')
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/jquery.mask.min.js') }}"></script>

    <script>
        $(document).ready(function($) {
            $('#cnpj').mask('00.000.000/0000-00').attr('maxlength', 18)
        })
    </script>
@endpush