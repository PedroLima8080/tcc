@extends('layouts.app-enter-user')

@section('content')
<div class="dev">
    <form method="POST" action="{{ route('register') }}" id="form" novalidate>
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
                <input id="email" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" type="email"
                    name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off" />
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
                <input id="data_nasc" class="form-control {{ $errors->has('data_nasc') ? 'is-invalid' : '' }}" type="date"
                    name="data_nasc" value="{{ old('data_nasc') }}" placeholder="Data de Nascimento" autocomplete="off" />
                @if ($errors->has('data_nasc'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('data_nasc') }}
                        </span>
                    </div>
                @endif
            </div>
        </div>

        <div class="form-group row">
            <div class="col-12">
                <select name="genero" id="genero" class="form-control {{ $errors->has('genero') ? 'is-invalid' : '' }}">
                    <option value="" selected>--Escolher Gênero--</option>
                    <option value="masculino">Masculino</option>
                    <option value="feminino">Feminino</option>
                    <option value="outro">Outro</option>
                </select>
                @if ($errors->has('genero'))
                    <div class="invalid-feedback">
                        <span>
                            {{ $errors->first('genero') }}
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
            <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                Já é registrado?
            </a>

            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-login text-white">
                    Register
                </button>
            </div>
        </div>

    </form>

    <form method="POST" action="{{ route('register') }}" id="form" class="form-enterprise">
        @csrf

        <div class="d-flex justify-content-center">
            <div class="title-login text-center h4 px-4 py-1 text-white">
                QUER SE CADASTRAR COMO BIBLIOTECA? 
            </div>
        </div>
            <a> <br> <b> Nosso site permite que sua empresa apresente seu catálogo em nossas pesquisas.
                Clique em "Tenho interesse" para saber como cadastrar sua empresa!</b> <br> <br> <br> </a>
       
            <div class="d-flex justify-content-center mt-4">
                <button class="btn btn-login ml-3 text-white">

               <b>Tenho interesse </b>
                
                </button>
            </div>
        </div>

    </form>
</div>


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush