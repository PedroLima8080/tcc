@extends('layouts.app-enter-user')

@section('content')
    <form method="POST" action="{{ route('saveNewPassword') }}" id="form" novalidate >
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                SOLICITAR TROCA DE SENHA
            </div>
        </div>

        <input type="hidden" name="id" value="{{ $id }}">

        <div class="form-group row mt-3">
            <div class="col-12">
                <div class="tcc-form-control {{ $errors->has('password') ? 'tcc-is-invalid' : '' }}">
                    <input id="password" type="password" name="password" value="{{ old('password') }}" autocomplete="off"
                        placeholder="Senha">
                    <label for="password">Nova Senha</label>
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

        <div class="form-group row mt-3">
            <div class="col-12">
                <div class="tcc-form-control {{ $errors->has('password') ? 'tcc-is-invalid' : '' }}">
                    <input id="password_confirmation" type="password" name="password_confirmation" value="{{ old('password_confirmation') }}" autocomplete="off"
                        placeholder="Confirmar senha">
                    <label for="password_confirmation">Confirmar Nova Senha</label>
                </div>
                @if ($errors->has('password_confirmation'))
                    <div class="tcc-invalid-feedback">
                        <span>
                            {{ $errors->first('password_confirmation') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="d-flex justify-content-center mt-4">
            <button class="btn btn-login text-white mx-auto">
                Enviar
            </button>
        </div>
    </form>

@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush
