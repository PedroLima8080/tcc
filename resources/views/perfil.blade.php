@extends('layouts.app-layout')

@section('title', 'Home')

@section('content')
    <div class="profile mt-5 px-5">
        <h2 class="text-center">Perfil</h2>
        @if (Auth::guard('user')->check())
            <form action="{{route('profile')}}" method="POST" class="mt-4"> 
                @csrf

                <div class="form-group row">
                    <div class="col-3">
                        <div class="tcc-form-control {{ $errors->has('nome') ? 'tcc-is-invalid' : '' }}">
                            <input id="nome" type="text" name="nome"
                                value="{{ old('nome') ? old('nome') : $perfil['nome'] }}" autocomplete="off"
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
                    <div class="col-3">
                        <div class="tcc-form-control {{ $errors->has('email') ? 'tcc-is-invalid' : '' }}">
                            <input id="email" type="email" name="email"
                                value="{{ old('email') ? old('email') : $perfil['email'] }}" autocomplete="off"
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
                    <div class="col-3">
                        <div class="tcc-form-control {{ $errors->has('cnpj') ? 'tcc-is-invalid' : '' }}">
                            <input id="data_nasc" type="date" name="data_nasc"
                                value="{{ old('data_nasc') ? old('data_nasc') : $perfil['data_nasc'] }}"
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
                    <div class="col-3">
                        <div class="tcc-form-control {{ $errors->has('genero') ? 'tcc-is-invalid' : '' }}">
                            <select name="genero" id="genero" class="form-control">
                                <option value="masculino" @if ($perfil['genero'] == 'masculino') selected @endif>Masculino</option>
                                <option value="feminino" @if ($perfil['genero'] == 'feminino') selected @endif>Feminino</option>
                                <option value="outro" @if ($perfil['genero'] == 'outro') selected @endif>Outro</option>
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
                <div class="d-flex justify-content-center mt-3">
                    <button class="btn btn-login text-white">
                        Salvar
                    </button>
                </div>
            </form>
        @elseif(Auth::guard('library')->check())

        @endif
    </div>
@endsection
