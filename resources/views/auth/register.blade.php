@extends('layouts.app-enter-user')

@section('title', 'Registre-se Aqui')

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
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('nome') ? 'tcc-is-invalid' : '' }}">
                        <input id="nome" type="text" name="nome" value="{{ old('nome') }}" autocomplete="off"
                            placeholder=" ">
                        <label for="nome">Nome</label>
                    </div>
                    @if ($errors->has('nome'))
                        <div class="tcc-invalid-feedback">
                            <span>
                                {{ $errors->first('nome') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

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
                    <div class="tcc-form-control {{ $errors->has('data_nasc') ? 'tcc-is-invalid' : '' }}">
                        <input id="data_nasc" type="date" name="data_nasc" value="{{ old('data_nasc') }}"
                            autocomplete="off" placeholder=" ">
                        <label for="data_nasc">Data de Nascimento</label>
                    </div>
                    @if ($errors->has('data_nasc'))
                        <div class="tcc-invalid-feedback">
                            <span>
                                {{ $errors->first('data_nasc') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('genero') ? 'tcc-is-invalid' : '' }}">
                        <select name="genero" id="genero"
                            class="form-control {{ $errors->has('genero') ? 'is-invalid' : '' }}">
                            <option value="" selected>--Escolher Gênero--</option>
                            <option value="masculino">Masculino</option>
                            <option value="feminino">Feminino</option>
                            <option value="outro">Outro</option>
                        </select>
                    </div>
                    @if ($errors->has('genero'))
                        <div class="tcc-invalid-feedback">
                            <span>
                                {{ $errors->first('genero') }}
                            </span>
                        </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('password') ? 'tcc-is-invalid' : '' }}">
                        <input id="password" type="password" name="password" value="{{ old('password') }}"
                            autocomplete="off" placeholder=" ">
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

            <div class="form-group row">
                <div class="col-12">
                    <div class="tcc-form-control {{ $errors->has('password_confirmation') ? 'tcc-is-invalid' : '' }}">
                        <input id="password_confirmation" type="password" name="password_confirmation"
                            value="{{ old('password_confirmation') }}" autocomplete="off" placeholder=" ">
                        <label for="password_confirmation">Confirmar Senha</label>
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

        <div id="form_library" class="form-enterprise">

            <div class="d-flex justify-content-center">
                <div class="title-login text-center h4 px-4 py-1 text-white">
                    QUER SE CADASTRAR COMO BIBLIOTECA?
                </div>
            </div>
            <br>
            <b>
                Nosso site permite que sua empresa apresente seu catálogo em nossas pesquisas.
                Clique em "Tenho interesse" para saber como cadastrar sua empresa!
            </b>
            <br> <br> <br>

            <a href="{{ route('registerLibrary') }}" class="text-white">
                <div class="d-flex justify-content-center mt-4">
                    <button class="btn btn-login ml-3 text-white">
                        Tenho interesse
                    </button>
                </div>
            </a>
        </div>

    </div>
    </div>


@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/css-login-register.css') }}">
@endpush
