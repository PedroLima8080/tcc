@extends('layouts.app-enter-user')

@section('content')
    <form method="POST" action="{{ route('loginLibrary') }}" id="form">
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                LOGIN
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="cnpj" class="form-control {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" type="text"
                    name="cnpj" value="{{ old('cnpj') }}" autofocus placeholder="CNPJ..." autocomplete="off" />
                @if ($errors->has('cnpj'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('cnpj') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    type="password" name="password" autocomplete="off" placeholder="Senha" />
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
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
