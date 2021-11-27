@extends('layouts.app-layout')

@section('title', 'Home')

@section('content')
    <div class="profile mt-5">
        @if (Auth::guard('user')->check())
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h2 class="card-title text-center">Perfil</h2>
                                    <form action="{{ route('profile') }}" method="POST" class="mt-5">
                                        @csrf
                                        <div class="form-group row">
                                            <div class="col-md-3 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('nome') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="nome" type="text" name="nome"
                                                        value="{{ old('nome') ? old('nome') : $perfil['nome'] }}"
                                                        autocomplete="off" placeholder=" ">
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
                                            <div class="col-md-3 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('email') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="email" type="email" name="email"
                                                        value="{{ $perfil['email'] }}" autocomplete="off" placeholder=" "
                                                        disabled>
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
                                            <div class="col-md-3 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('cnpj') ? 'tcc-is-invalid' : '' }}">
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
                                            <div class="col-md-3 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('genero') ? 'tcc-is-invalid' : '' }}">
                                                    <select name="genero" id="genero" class="form-control">
                                                        <option value="masculino" @if ($perfil['genero'] == 'masculino') selected @endif>Masculino
                                                        </option>
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
                                        <div class="d-flex justify-content-center mt-5">
                                            <button class="btn btn-login text-white">
                                                Salvar
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        @elseif(Auth::guard('library')->check())
            <div class="page-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 ">
                            <div class="card">
                                <div class="card-body p-5">
                                    <h2 class="card-title text-center">Perfil</h2>
                                    <form action="{{ route('profile') }}" method="POST" class="mt-4">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('nome') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="nome" type="text" name="nome"
                                                        value="{{ old('nome') ? old('nome') : $perfil['nome'] }}"
                                                        autocomplete="off" placeholder=" ">
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
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('email') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="email" type="email" name="email"
                                                        value="{{ $perfil['email'] }}" autocomplete="off" placeholder=" "
                                                        disabled>
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
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('cnpj') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="cnpj" type="text" name="cnpj"
                                                        value="{{ $perfil['cnpj'] }}" autocomplete="off" placeholder=" "
                                                        disabled>
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
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('fone') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="fone" type="text" name="fone"
                                                        value="{{ old('fone') ? old('fone') : $perfil['fone'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="fone">Telefone</label>
                                                </div>
                                                @if ($errors->has('fone'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('fone') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('cep') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="cep" type="text" name="cep"
                                                        value="{{ old('cep') ? old('cep') : $perfil['cep'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="cep">CEP</label>
                                                </div>
                                                @if ($errors->has('cep'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('cep') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('cidade') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="cidade" type="text" name="cidade"
                                                        value="{{ old('cidade') ? old('cidade') : $perfil['cidade'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="cidade">Cidade</label>
                                                </div>
                                                @if ($errors->has('cidade'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('cidade') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('endereco') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="endereco" type="text" name="endereco"
                                                        value="{{ old('endereco') ? old('endereco') : $perfil['endereco'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="endereco">Endereco</label>
                                                </div>
                                                @if ($errors->has('endereco'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('endereco') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-4 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('bairro') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="bairro" type="text" name="bairro"
                                                        value="{{ old('bairro') ? old('bairro') : $perfil['bairro'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="bairro">Bairro</label>
                                                </div>
                                                @if ($errors->has('bairro'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('bairro') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('uf') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="uf" type="text" name="uf"
                                                        value="{{ old('uf') ? old('uf') : $perfil['uf'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="uf">UF</label>
                                                </div>
                                                @if ($errors->has('uf'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('uf') }}
                                                        </span>
                                                    </div>
                                                @endif
                                            </div>
                                            <div class="col-md-2 mb-3">
                                                <div
                                                    class="tcc-form-control {{ $errors->has('numero') ? 'tcc-is-invalid' : '' }}">
                                                    <input id="numero" type="text" name="numero"
                                                        value="{{ old('numero') ? old('numero') : $perfil['numero'] }}"
                                                        autocomplete="off" placeholder=" ">
                                                    <label for="numero">Numero</label>
                                                </div>
                                                @if ($errors->has('numero'))
                                                    <div class="tcc-invalid-feedback">
                                                        <span>
                                                            {{ $errors->first('numero') }}
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    </div>
@endsection

@push('styles')
    <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
@endpush
