@extends('layouts.app-enter-user')

@section('content')
<div class="dev">
    <form method="POST" action="{{ route('registerLibrary') }}" id="form_library" novalidate>
        @csrf
        <div class="d-flex justify-content-center">
            <div class="title-login text-center h2 px-4 py-1 text-white">
                REGISTER
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-md-12">
                <input id="nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" type="text"
                    name="nome" value="{{ old('nome') }}" autofocus placeholder="Nome" autocomplete="off" />
                @if ($errors->has('nome'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('nome') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <input id="cnpj" class="form-control {{ $errors->has('cnpj') ? 'is-invalid' : '' }}" type="text"
                    name="cnpj" value="{{ old('cnpj') }}" placeholder="CNPJ" autocomplete="off" />
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
            <div class="col-4">
                <input id="cep" class="form-control {{ $errors->has('cep') ? 'is-invalid' : '' }}" type="text"
                    name="cep" value="{{ old('cep') }}" placeholder="CEP..." autocomplete="off" />
                @if ($errors->has('cep'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('cep') }}
                        </span>
                    </div>
                @endif
            </div>

            <div class="col-4">
                <input id="cidade" class="form-control {{ $errors->has('cidade') ? 'is-invalid' : '' }}" type="text"
                    name="cidade" value="{{ old('cidade') }}" placeholder="cidade..." autocomplete="off" />
                @if ($errors->has('cidade'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('cidade') }}
                        </span>
                    </div>
                @endif
            </div>

            <div class="col-4">
                <input id="uf" class="form-control {{ $errors->has('uf') ? 'is-invalid' : '' }}" type="text"
                    name="uf" value="{{ old('uf') }}" placeholder="UF" autocomplete="off" />
                @if ($errors->has('uf'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('uf') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-4">
                <input id="bairro" class="form-control {{ $errors->has('bairro') ? 'is-invalid' : '' }}" type="text"
                    name="bairro" value="{{ old('bairro') }}" placeholder="bairro..." autocomplete="off" />
                @if ($errors->has('bairro'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('bairro') }}
                        </span>
                    </div>
                @endif
            </div>

            <div class="col-4">
                <input id="endereco" class="form-control {{ $errors->has('endereco') ? 'is-invalid' : '' }}" type="text"
                    name="endereco" value="{{ old('endereco') }}" placeholder="Endereço..." autocomplete="off" />
                @if ($errors->has('endereco'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('endereco') }}
                        </span>
                    </div>
                @endif
            </div>

            <div class="col-4">
                <input id="numero" class="form-control {{ $errors->has('numero') ? 'is-invalid' : '' }}" type="text"
                    name="numero" value="{{ old('numero') }}" placeholder="Número..." autocomplete="off" />
                @if ($errors->has('numero'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('numero') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-6">
                <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" value="{{ old('email') }}" placeholder="Email..." autocomplete="off" />
                @if ($errors->has('email'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('email') }}
                        </span>
                    </div>
                @endif
            </div>
            <div class="col-6">
                <input id="fone" class="form-control {{ $errors->has('fone') ? 'is-invalid' : '' }}" type="text"
                    name="fone" value="{{ old('fone') }}" placeholder="Telefone..." autocomplete="off" />
                @if ($errors->has('fone'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('fone') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-12">
                <input id="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                    type="password" name="password" placeholder="password" autocomplete="off" />
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
                    name="password_confirmation" placeholder="Confirmar Senha" autocomplete="off" />
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
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('loginLibrary') }}">
                Já é registrado?
            </a>
            <br>
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('register') }}">
                Registrar-se como Usuário
            </a>

            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-login text-white">
                    Register
                </button>
            </div>
        </div>
    </form>
</div>


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
            $('#cep').mask('00000-000').attr('maxlength', 9)
            $('#fone').mask('(00) 00000-0000').attr('maxlength', 15)
        })
    </script>
@endpush