@extends('layouts.app-layout')

@section('content')

    <form method="POST" action="{{ route('register') }}" class="form">
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                REGISTER
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="name" class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text"
                    name="name" value="{{ old('name') }}" autofocus placeholder="Nome" />
                @if ($errors->has('name'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('name') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" value="{{ old('email') }}" placeholder="Email" />
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
                    type="password" name="password" placeholder="Senha" />
                @if ($errors->has('password'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('password') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="password_confirmation"
                    class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}" type="password"
                    name="password_confirmation" placeholder="Confirmar Senha" />
                @if ($errors->has('password_confirmation'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('password_confirmation') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Já é registrado?
            </a>

            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-login ml-3 text-white">
                    Register
                </button>
            </div>
        </div>
    </form>

@endsection
