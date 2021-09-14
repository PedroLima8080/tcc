@extends('layouts.app-enter-user')

@section('content')
    <form method="POST" action="{{ route('login') }}" id="form" novalidate >
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                LOGIN
            </div>
        </div>

        {{-- <div class="form-group row">
            <div class="col-12">
                <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" value="{{ old('email') }}" autofocus placeholder="Email" autocomplete="off" />
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('email') }}
                        </span>
                    </div>
                @endif
            </div>
        </div> --}}

        <div class="form-group row">
            <div class="col-12">
                <div class="tcc-form-control {{ $errors->has('email') ? 'tcc-is-invalid' : '' }}">
                    <input id="email" type="email" name="email" value="{{ old('email') }}" autocomplete="off"
                        placeholder=" ">
                    <label for="email">Email</label>
                </div>
                @if ($errors->has('email'))
                    <div class="tcc-invalid-feedback">
                        <span>
                            {{ $errors->first('email') }}
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
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                    Registre-se aqui
                </a> <br>
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('loginLibrary') }}">
                    Logar-se como biblioteca
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
