@extends('layouts.app-enter-user')

@section('content')
    <form method="POST" action="{{ route('login') }}" class="form">
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                LOGIN
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" value="{{ old('email') }}" autofocus placeholder="Email" />
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('email') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    type="password" name="password" autocomplete="current-password" placeholder="Senha" />
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
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                        Registre-se aqui
                    </a>
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-login ml-3 text-white">
                Login
            </button>
        </div>
    </form>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush